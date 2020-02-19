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
    function drugs_categories_report($category_id = 1)
    {
        $output = "";
        $category = DrugCategory::find($category_id);
        $drugs = $category->drugs()->get();
        foreach ($drugs as $drug) {
            $output .= $drug->name_arabic;
            $output .= "      ";
            $output .= $drug->company()->first()->name;
            $output .= "      ";
            $output .= $drug->chemical_composition;
            $output .= "      ";
            $output .= "<br />";
            foreach ($drug->repo()->where('isDisposed', '0')->get() as $drug_repo) {
                $output .= $drug_repo->exp_date;
                $output .= "      ";
                $output .= $drug_repo->packages_number;
                $output .= "      ";
                $output .= $drug_repo->units_number;
            }
            $output .= "<br />";
            $output .= "<br />";
        }
        echo $output;
    }

    function drugs_categories_sells()
}
