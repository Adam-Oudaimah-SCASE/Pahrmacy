<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Invoice;
use App\Models\DrugsRepo;
use App\Models\InvoiceType;
use App\Models\InsuranceCompany;
use App\Models\Order;
use App\Models\WareHouse;
use App\Models\Company;
use App\Models\DrugOrderSend;
use App\Models\DrugOrderReceive;
use App\Models\Balance;
use App\Models\AccountingType;
use App\Models\AccountingOperation;
use DrugController;

class InvoiceController extends Controller
{
    /**
    * Return the appropriate view to create a sell invoice.
    *
    * @return \Illuminate\Http\Response
    */
    function create_invoice()
    {
        // Get all types
        $types = InvoiceType::all();
        // Return the appropriate view
        return view('');
    }

    /**
    * This is the route method that is responsible for handling every types of invoices.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    function store_invoice(Request $request)
    {
        // Initiate the drugs reposotray controller
        $repo_controller = new DrugController;
        // Get the invoice type
        $invoice_type = InvoiceType::find($request->input('invoice_type_id'));

        switch ($invoice_type->name) {
            case 'sell':
                // Handle the sell invoice
                handle_sell_invoice($repo_controller, $request);
                // Go to the payment view
                return view('')->with(['invoice' => $invoice]);
                break;

            case 'buy_order':
                // Handle the buy order send invoice
                handle_buy_order_invoice($request);
                // Return to sent orders page
                return view('')->with(['orders' => Order::all()]);
                break;

            case 'buy_recieve':
                // Handle buy receive order invoice
                if (handle_buy_receive_invoice($repo_controller, $request) {
                    // Return the appropriate view
                    return view('')->with(['orders' => Order::all()]);
                }
                else {
                    echo "Invalid receive request";
                }
                break;

            case 'dispose':

            default:
                // code...
                break;
        }
    }

    /**
    * An internal method responsible for handling the sell invoice.
    */
    function handle_sell_invoice($repo_controller, $request)
    {
        // Create the new sell invoice instance
        $invoice = new Invoice;
        // Associate the invoice type
        $invoice->invoice_type()->associate($invoice_type);

        // Assign the shared invoce values from the request
        $invoice->date = $request->input('date');
        $invoice->notes = $reques->input('notes');
        // Set the discount reason if any
        $invoice->discount_reason = $request->input('discount_reason') == null ? 'لا يوجد سبب' : $request->input('discount_reason');

        // Get the drugs isds and information
        $drugs_ids = $request->input('drugs.ids.*');
        $drugs_packages_number = $request->input('drugs.packages_number.*');
        $drugs_units_number = $reques->input('drugs.units_number.*');
        $modified_drugs_package_sell_price = $request->input('drugs.modified_drugs_package_sell_price.*');
        $modified_drugs_unit_sell_price = $request->input('drugs.modified_drugs_unit_sell_price.*');

        // Drugs info
        // Each element will have the following struture
        // [Drug ID, Packages number, Units number, New package sell price, New unit sell price]
        $drugs_info = array();

        for ($i=0; $i<count($drugs_ids); $i++) {
            // Create each list entry of the drugs list
            $drug_info = array($drugs_ids[$i], $drugs_packages_number[$i], $drugs_units_number[$i], $modified_drugs_package_sell_price[$i], $modified_drugs_unit_sell_price[$i]);
            array_push($drugs_info, $drug_info);
        }
        // Calculate the prices and update the drugs reposotary
        $prices = $repo_controller->update_drug_repo_from_sell_invoice($invoice->id, $drugs_info);
        $invoice->net_price = $prices[0];
        $invoice->sell_price = $prices[1];

        // Create the appropriate accounting operation
        $accounting_type = AccountingType::where('name', 'فاتورة مبيعات');
        $accounting_operation = new AccountingOperation;
        $accounting_operation->date = $request->input('date');
        $accounting_operation->amount = $invoice->sell_price;
        $accounting_operation->type()->associate($accounting_type);
        $accounting_operation->save();

        // Add it to the balance table
        $balance = Balance::all();
        $balance->balance += $invoice->sell_price;
        $balance->save();

        if ($request->input('discount_amount') != null) {
            $invoice->discount_amount = $request->input('discount_amount');
            $invoice->discount_percentage = 0;
            $invoice->insurance_company_id = 0;
        } else {
            if ($request->input('insurance_company_id') != null) {
                $insurance_company = InsuranceCompany::find($request->input('insurance_company_id'));
                $invoice->discount_percentage = $insurance_company->discount;
                $invoice->discount_amount = $invoice->sell_price * $invoice->discount_percentage;
                $invoice->insurance_company()->associate($insurance_company);
            } else {
                $invoice->discount_percentage = 0;
                $invoice->discount_amount = 0;
                $invoice->insurance_company_id = 0;
            }
        }
        $invoice->is_paid = false;
        $invoice->save();
    }

    /**
    * An internal method responsible for handling the but order invoice.
    */
    function handle_buy_order_invoice($request)
    {
        // Create a new Order instance.
        $order = new Order;
        $order->date = $request->input('date');

        // Check if the supplier is a company or a warehouse, and bind it to the order
        $supplier = WareHouse::find($request->input('supplier_id'));
        if (!$supplier) {
            $supplier = Company::find($request->input('supplier_id'));
            $order->companies()->associate($supplier);
        }
        else {
            $order->warehouses()->associate($supplier);
        }
        // Get the required information from the request
        $drugs_ids = $request->input('drugs.ids.*');
        $drugs_packages_number = $request->input('drugs.packages_number.*');
        $drugs_units_number = $reques->input('drugs.units_number.*');

        // Loop over the drugs, and create an appropriate entry in the drug_order_send table
        for ($i=0; $i<count($drugs_ids); $i++) {
            $drug_order_send = new DrugOrderSend;
            $drug_order_send->drug()->associate(Drug::find($drugs_ids[$i]));
            $drug_order_send->order()->associate($order);
            $drug_order_send->ordered_packages_number = $drugs_packages_number[$i];
            $drug_order_send->ordered_units_number = $drugs_units_number[$i];
            $drug_order_send->save();
        }

        // Save the order
        $order->save();
    }

    /**
    * An internal method responsible for handling the buy receive invoice.
    */
    function handle_buy_receive_invoice($repo_controller, $request)
    {
        // Get the drugs isds and information
        $order_id = $request->input('order_id');
        $order = Order::find($order_id);
        $drugs_ids = $request->input('drugs.ids.*');
        $drugs_unit_number = $reques->input('drugs.unit_number.*');
        $drugs_packages_number = $request->input('drugs.packages_number.*');
        $drugs_units_number = $reques->input('drugs.units_number.*');
        $drugs_package_net_price = $request->input('drugs.package_net_price.*');
        $drugs_unit_net_price = $request->input('drugs.unit_net_price.*');
        $drugs_package_sell_price = $request->input('drugs.package_sell_price.*');
        $drugs_unit_sell_price = $request->input('drugs.unit_sell_price.*');
        $drugs_expiration_dates = $request->input('drugs.expiration_date.*');
        $drugs_production_dates = $request->input('drugs.production_date.*');

        // Drugs info
        // Each element will have the following struture
        // [Drug ID, Unit number, Packages number, Units number, Expiration date, Production date, Package Sell price, Package Net price, Unit Sell price, Unit Net price]
        $drugs_info = array();

        for ($i=0; $i<count($drugs_ids); $i++) {
            // Create each list entry of the drugs list
            $drug_info = array($drugs_ids[$i], $drugs_unit_number[$i], $drugs_packages_number[$i], $drugs_units_number[$i],
                $drugs_production_dates[$i], $drugs_production_dates[$i],
                $drugs_package_sell_price[$i], $drugs_package_net_price[$i],
                $drugs_package_unit_price[$i], $drugs_unit_net_price[$i],);
            array_push($drugs_info, $drug_info);
            $drug_order_receive = new DrugOrderReceive;
            $drug_order_receive->order()->associate($order);
            $drug_order_receive->unit_number = $drugs_unit_number[$i];
            $drug_order_receive->package_net_price = $drugs_package_net_price[$i];
            $drug_order_receive->unit_net_price = $drugs_unit_net_price[$i];
            $drug_order_receive->recieved_packages_number = $drugs_packages_number[$i];
            $drug_order_receive->recieved_units_number = $drugs_units_number[$i];
            $drug_order_receive->save();
        }

        // Update the repo
        if ($repo_controller->update_drugs_repo_from_incoming_invoice($order_id, $drugs_info))
        {
            $order->is_delivered = true;
            $order->net_price = $request->input('price');

            // Add the appropriate accounting operation
            $accounting_type = AccountingType::where('name', 'فاتورة مشتريات أدوية');
            $accounting_operation = new AccountingOperation;
            $accounting_operation->date = $request->input('date');
            $accounting_operation->amount = $order->net_price;
            $accounting_operation->type()->associate($accounting_type);
            $accounting_operation->save();

            // Add it to the balance table
            $balance = Balance::all();
            $balance->balance -= $order->net_price;
            $balance->save();
            return true;
        }
        else {
            false;
        }
    }
}
