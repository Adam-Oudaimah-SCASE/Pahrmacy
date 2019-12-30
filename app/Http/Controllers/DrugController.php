<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Drug;
use App\Models\DrugShape;
use App\Models\DrugCategory;
use App\Models\DrugsRepo;
use App\Models\Company;

class DrugController extends Controller
{
    /**
     * Helper method to get all the drugs and its detials from the repo.
     * 
     * @return List All the drugs with all its details
     */
    public function get_drugs_details()
    {
        return DB::table('drugs')
        ->join('drugs_repo', 'drugs.id', '=', 'drugs_repo.drug_id')
        ->groupBy('drugs.id')
        ->orederBy('drugs_repo.exp_date', 'DESC')
        ->orederBy('drugs_repo.packages_number', 'DESC')
        ->orederBy('drugs_repo.units_number', 'DESC')
        ->get();
    }

    /**
     * Helper method to get the drug using its bar code.
     * 
     * @return Drug Object for the targeted drug
     */
    public function get_drug_by_bracode($barcode)
    {
        return Drug::where('local_barcode', $barcode)->get();
    }

    /**
     * Helper method to get the drug with its details from the repo.
     * 
     * @return Drug Object for the targeted drug
     */
    public function get_drug_details($drug)
    {
        return DB::table('drugs')
        ->join('drugs_repo', 'drugs.id', '=', 'drugs_repo.drug_id')
        ->where('drugs.id', $drug->id)
        ->groupBy('drugs.id')
        ->orederBy('drugs_repo.exp_date', 'DESC')
        ->orederBy('drugs_repo.packages_number', 'DESC')
        ->orederBy('drugs_repo.units_number', 'DESC')
        ->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all the drugs with all its details from the repo using the query builder
        $drugs = $this->get_drugs_details();

        // Return the appropriate view
        return view('')->withDrugs($drugs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get all the required data
        $categories = DrugCategory::all();
        $shapes = DrugShape::all();
        $companies = Company::all();
         return view('')->with([
             'categories' => $categories,
             'shapes' => $shapes,
             'companies' => $companies
         ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // Create the new drug entry
        $drug = new Drug;
        $drug_repo = new DrugsRepo;

        // Grap the drug data
        $drug->name_english = $request->input('name_english');
        $drug->name_arabic = $request->input('name_arabic');
        $drug->chemical_composition = $request->input('chemical_composition');
        $drug->volume_unit = $request->input('volume_unit');
        $drug->unit_number = $request->input('unit_number');
        $drug->net_price = $request->input('net_price');
        $drug->sell_price = $request->input('sell_price');
        $drug->lic_palte = $request->input('lic_palte');
        $drug->local_barcode = $request->input('local_barcode');
        $drug->global_barcode = $request->input('global_barcode');

        // Save the new drug
        $drug->save();

        // Associate the foreign keys
        $drug->company()->save(Company::find($request->input('company_id')));
        $drug->category()->save(DrugCategory::find($request->input('category_id')));
        $drug->shape()->save(DrugShape::find($request->input('shape_id')));

        // Add the appropriate drugs repo record
        $drug_repo->pro_date = $request->input('pro_date');
        $drug_repo->exp_date = $request->input('exp_date');

        // Check if units are inserted
        if ($request->input('units_number') != null || str($request->input('units_number')) != "0") {
            $drug_repo->packages_number = (int) ($request->input('units_number') / $drug->unit_number);
            $drug_repo->units_number = $request->input('units_number');
        }
        else {
            $drug_repo->packages_number = $request->input('packages_number');
            $drug_repo->units_number = $request->input('packages_number') * $drug->unit_number;
        }

        // Puclish the new attributes to the repo and bind it with the appropriate drug
        $drug_repo->save();
        $drug_repo->drug()->save($drug);

        // Get all the drugs
        $drugs = $this->get_drugs_details();
        // Return the appropriate view
        return view('')->withDrugs($drugs);
    }

    /**
     * Get the drug repo to update.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit_drug_repo(Request $request)
    {
        // Get the corresponding drug
        $drug = $this->get_drug_details(Drug::find($request->input('drug_id')));
        // Return the appropriate view
        return view('')->withDrug($drug);
    }

    /**
     * Update the repo of a certain drug.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_drug_repo(Request $request)
    {
        // Get the corresponding drug
        $drug = $this->get_drug_details(Drug::find($request->input('drug_id')));
        // Get its repo
        /**
         * @todo: The targeted details of the drug has to be specified by the expiration date or other attribute by the user
         */
        $drug_repo = null;

        if ($request->input('units_number') != null || str($request->input('units_number')) != "0") {
            $drug_repo->packages_number = (int) ($request->input('units_number') / $drug->unit_number);
            $drug_repo->units_number = $request->input('units_number');
        }
        else {
            $drug_repo->packages_number = $request->input('packages_number');
            $drug_repo->units_number = $request->input('packages_number') * $drug->unit_number;
        }

        // Puclish the new attributes to the repo
        $drug_repo->save();

        // Get all the drugs
        $drugs = $this->get_drugs_details();
        // Return the appropriate view
        return view('')->withDrugs($drugs);
    }
}
