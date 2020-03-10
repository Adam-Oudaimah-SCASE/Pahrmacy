<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AccountingOperation;
use App\Models\AccountingType;
use App\Models\Balance;
use App\Models\Company;
use App\Models\Drug;
use App\Models\DrugCategory;
use App\Models\DrugInvoice;
use App\Models\DrugOrderReceive;
use App\Models\DrugOrderSend;
use App\Models\DrugShape;
use App\Models\DrugsRepo;
use App\Models\InsuranceCompany;
use App\Models\Invoice;
use App\Models\InvoiceType;
use App\Models\Order;
use App\Models\WareHouse;
use App\Http\Controllers\DrugController;

class ReportController extends Controller
{
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
        // Return the approriate view
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
        // Return the approriate view
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
        // Return the approriate view
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
        // Containes the final result
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
        // Return the approriate view
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
        // Containes the final result
        $result = array();
        // Get all invoices for the current day
        $invoices = Invoice::whereBetween('date', [date('Y-m-d', strtotime('2020-03-01')), date('Y-m-d', strtotime('2020-04-01'))])->get();
        // Loop over the invoices
        foreach ($invoices as $invoice) {
            $info = array();
            array_push($info, $invoice->id);
            array_push($info, $invoice->sell_price_after_discount);
            $paid = $invoice->operations->sum('amount');
            array_push($info, $invoice->sell_price_after_discount - $paid);
            array_push($result, $info);
        }
        // Return the approriate view
        return view('reports.DailySalesReport')->with(['invoices' => $result]);
    }

    /**
     * The result is returned as an array which has the following structure:
     * []
     *
     * @return \Illuminate\Http\Response
     */
    function earnings_report()
    {
        // Containes the final result
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
        // TODO: We have to add the payament for this day, (The view is not emplemented yet)
        array_push($result, $sells, $un_paid_sells, $sells_orders, $un_paid_orders);
        // Return the approriate view
        return view('reports.EarningsAndBudgetReport')->with(['prices' => $result]);
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
        // Containes the final result
        $result = array();
        $sum = 0;
        // Get all orders for the current day
        $orders = Order::whereBetween('date', [date('Y-m-d', strtotime('2020-02-28')), date('Y-m-d', strtotime('2020-04-01'))])->get();
        // Loop over the invoices
        foreach ($orders as $order) {
            $info = array();
            array_push($info, $order->id);
            $sum += $order->net_price;
            $paid = $order->operations->sum('amount');
            array_push($info, $paid);
            array_push($info, $order->net_price - $paid);
            array_push($result, $info);
        }
        // Return the approriate view
        return view('reports.PurchasesReport')->with(['orders' => $result, 'sum' => $sum]);
    }
}
