<?php

namespace App\Http\Controllers;

use App\Models\AccountingOperation;
use App\Models\Company;
use App\Models\Drug;
use App\Models\DrugCategory;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\WareHouse;

class ReportController extends Controller
{
    /**
     * Assign appropriate permissions.
     */
    public function __construct()
    {
        $this->middleware('permission:report-show');
    }

    /**
     * Report about the drugs for a certain category.
     *
     * @return \Illuminate\Http\Response
     */
    function category_report($category_id)
    {
        // Get the category
        $category = DrugCategory::find($category_id);
        // Get the related drugs for this category
        $drugs = $category->drugs()->get();
        // Return the appropriate view
        return view('reports.categoryReport')->with(['drugs' => $drugs]);
    }

    /**
     * Report about the sales for a certain category.
     *
     * @return \Illuminate\Http\Response
     */
    function category_sales_report($category_id)
    {
        // Get the category
        $category = DrugCategory::find($category_id);
        // Get the related drugs for this category
        $drugs = $category->drugs()->get();
        // Return the appropriate view
        return view('reports.categorySalesReport')->with(['drugs' => $drugs]);
    }

    /**
     * Report about the drugs of all companies.
     *
     * @return \Illuminate\Http\Response
     */
    function companies_report()
    {
        // Get the companies
        $companies = Company::all();
        // Return the appropriate view
        return view('reports.companiesReport')->with(['companies' => $companies]);
    }

    /**
     * Report about the sales of all companies.
     * The result is returned as an array, each element of this array has the following structure:
     * [company's name, the sum of all sell prices after discount]
     *
     * @return \Illuminate\Http\Response
     */
    function companies_sales_report()
    {
        // Contains the final result
        $result = array();
        // Get the companies
        $companies = Company::all();
        foreach ($companies as $company) {
            $info = array();
            array_push($info, $company->name);
            $sell_prices = 0;
            foreach ($company->drugs as $drug) {
                $sell_prices = $drug->invoices->sum('sell_price_after_discount');
            }
            array_push($info, $sell_prices);
            array_push($result, $info);
        }
        // Return the appropriate view
        return view('reports.companiesSalesReport')->with(['companies' => $result]);
    }

    /**
     * Report about the daily sales.
     * The result is returned as an array, each element of this array has the following structure:
     * [invoice's id, sell price after discount, remaining amount]
     *
     * @return \Illuminate\Http\Response
     */
    function daily_sales_report()
    {
        // Contains the final result
        $result = array();
        // Get all invoices for the current day
        $invoices = Invoice::whereBetween('date', [date('Y-m-d', strtotime('2020-03-01')), date('Y-m-d', strtotime('2020-04-01'))])->get();
        // Return the appropriate view
        return view('reports.DailySalesReport')->with(['invoices' => $invoices]);
    }

    /**
     * The result is returned as an array which has the following structure:
     * []
     *
     * @return \Illuminate\Http\Response
     */
    function earnings_report()
    {
        // Contains the final result
        $result = array();
        // Get all invoices for the current day
        $invoices = Invoice::whereBetween('date', [date('Y-m-d', strtotime('2020-03-01')), date('Y-m-d', strtotime('2020-04-01'))])->get();
        $sells = 0;
        $un_paid_sells = 0;
        // Loop over the invoices
        foreach ($invoices as $invoice) {
            $sells += $invoice->sell_price_after_discount;
            $un_paid_sells += $invoice->sell_price_after_discount - $invoice->operations->sum('amount');
        }
        // Get all orders for the current day
        $orders = Order::whereBetween('date', [date('Y-m-d', strtotime('2020-02-28')), date('Y-m-d', strtotime('2020-04-01'))])->get();
        $sells_orders = 0;
        $un_paid_orders = 0;
        // Loop over the invoices
        foreach ($orders as $order) {
            $sells_orders += $order->net_price;
            $un_paid_orders += $order->net_price - $order->operations->sum('amount');
        }
        // Get all the accounting operations (which now made by an invoice or an order)
        $expenses = 0;
        $operations = AccountingOperation::where('operationable_id', null)->whereBetween('date', [date('Y-m-d', strtotime('2020-02-28')), date('Y-m-d', strtotime('2020-04-01'))])->get();
        foreach ($operations as $operation) {
            $expenses += $operation->amount;
        }
        array_push($result, $sells, $un_paid_sells, $sells_orders, $un_paid_orders, $expenses);
        // Return the appropriate view
        return view('reports.EarningsAndBudgetReport')->with(['prices' => $result]);
    }

    /**
     * The result of expenses spended in a period.
     *
     * @return \Illuminate\Http\Response
     */
    function expenses_report()
    {
        // Get all the accounting operations (which now made by an invoice or an order)
        $operations = AccountingOperation::where('operationable_id', null)
                        ->whereBetween('date', [date('Y-m-d', strtotime('2020-02-28')), date('Y-m-d', strtotime('2020-04-01'))])
                        ->get();
        // Return the appropriate view
        return view('reports.ExpenseReport')->with(['operations' => $operations]);
    }

    /**
     * Report about the daily sales.
     * The result is returned as an array, each element of this array has the following structure:
     * [invoice's id, sell price after discount, remaining amount]
     *
     * @return \Illuminate\Http\Response
     */
    function orders_report()
    {
        // Get all orders for the current day
        $orders = Order::whereBetween('date', [date('Y-m-d', strtotime('2020-02-28')), date('Y-m-d', strtotime('2020-04-01'))])->get();
        // Return the appropriate view
        return view('reports.PurchasesReport')->with(['orders' => $orders]);
    }

    /**
     * Report expired drugs.
     * The result is an array of the expired drug repo.
     *
     * @return \Illuminate\Http\Response
     */
    function expired_drug_report()
    {
        $result = array();
        // Get all drugs
        $drugs = Drug::all();
        // Add the expired drugs only
        foreach ($drugs as $drug) {
            foreach ($drug->repo()->whereDate('exp_date', '<', date('Y-m-d'))->get() as $drug_repo) {
                array_push($result, $drug_repo);
            }
        }
        // Return the appropriate view
        return view('reports.QuantitiesOfExpiredDrugs')->with(['drugs' => $result]);
    }

    /**
     * Report of warehouses.
     *
     * @return \Illuminate\Http\Response
     */
    function warehouses_report()
    {
        // Get all orders for the current day
        $warehouses = WareHouse::all();
        // Return the appropriate view
        return view('reports.WarehouseOrdersReport')->with(['warehouses' => $warehouses]);
    }
}
