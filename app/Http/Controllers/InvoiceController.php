<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Invoice;
use App\Models\Drug;
use App\Models\DrugsRepo;
use App\Models\InvoiceType;
use App\Models\InsuranceCompany;
use App\Mdoels\DrugInvoice;
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
    */
    function store_invoice(Request $request)
    {
        // Initiate the drugs reposotray controller
        $repo_controller = new DrugController;
        // Get the invoice type
        $invoice_type = InvoiceType::find($request->input('invoice_type_id'));
        // Associate the invoice type
        $invoice->invoice_type()->associate($invoice_type);
        switch ($invoice_type->name) {
            case 'sell':
                // Create the new sell invoice instance
                $invoice = new Invoice;

                // Assign the shared invoce values from the request
                $invoice->date = $request->input('date');
                $invoice->notes = $reques->input('notes');
                // Set the discount reason if any
                $invoice->discount_reason = $request->input('discount_reason') == null ? 'لا يوجد سبب' : $request->input('discount_reason');

                // Get the drugs isds
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
                $prices = $repo_controller->update_drug_repo_from_sell_invoice($repo_controller->id, $drugs_info);
                $invoice->net_price = $prices[0];
                $invoice->sell_price = $prices[1];

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
                // Go the payment view
                return view('')->with(['invoice' => $invoice]);
                break;

            case 'buy_order':

            case 'buy_recieve':

            case 'dispose':

            default:
                // code...
                break;
        }
    }
}
