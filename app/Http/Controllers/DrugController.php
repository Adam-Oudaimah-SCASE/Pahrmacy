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
     * @return Drug Object with its repo details for the targeted drug
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
        // Get all the drugs with all its details from the repo
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
        // TODO: Move net price and sell price from drugs table to drugs_repo table
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
    * Update the repo when a sell invoice is generated.
    * The update will happen on the oldest drug repo (according to the expiration date).
    * The passed drugs info will be a list of lists.
    * Each element of this list contains the following information:
    * [Drug ID, Packages number, Units number, Sell price(if a new one needed), Net price(if a new one needed)]
    *
    * @return List [Full net price of the selled drugs, Full sell price of the selled drugs]
    */
    public function update_drug_repo_from_sell_invoice($drugs_info)
    {
      $full_net_price = 0;
      $full_sell_price = 0;
      // Loop over each drug
      foreach ($drugs_info as $drug_info) {
          // Grap the required drug information
          $drug_id = $drug_info[0];
          // Get the oldest drug repo
          $drug_repos = DrugsRepo::where('drug_id', '=', $drug_id)->orederBy('exp_date', 'DESC')->get();
          $drug_repo = $drug_repos[0];
          $drug_packages_number = $drug_info[1];
          $drug_units_number = $drug_info[2];
          $drug_new_sell_price = $drug_info[3];
          $drug_new_net_price = $drug_info[4];

          // Manipulate the quantity
          if ($drug_units_number != null) {
              $drug_repo->packages_number -= (int) ($drug_packages_number / $drug->unit_number);
              $drug_repo->units_number -= $drug_units_number;
          }
          else {
              $drug_repo->packages_number -= $drug_packages_number;
              $drug_repo->units_number -= $drug_packages_number * $drug->unit_number;
          }

          // Check for new prices
          if ($drug_new_sell_price != null) {
              $drug_repo->sell_price = $drug_new_sell_price;
          } else {
              $drug_repo->sell_price = $drug->sell_price;
          }
          if ($drug_new_net_price != null) {
              $drug_repo->net_price = $drug_new_net_price;
          } else {
              $drug_repo->net_price = $drug->net_price;
          }
          // Puclish the new attributes to the repo
          $drug_repo->save();
          $drug_repo->drug()->save($drug);

          // Update the result prices
          $full_net_price += $drug_repo->net_price;
          $full_sell_price += $drug_repo->sell_price;
      }

      // Return the final result
      $result = [];
      array_push($result, $full_net_price, $full_sell_price);
      return $result;
    }

    /**
     * Update the repo.
     * This method is used when recieving a buy inoice.
     * The needed information are passed as a list of lists ($drugs_info).
     * Each element of this list contains the following information:
     * [Drug ID, Packages number, Units number, Expiration date, Production date, Package Sell price, Package Net price, Unit Sell price, Unit Net price]
     *
     * @return List [Full net price of the inserted drugs, Full sell price of the inserted drugs]
     */
    public function update_drugs_repo_from_incoming_invoice($drugs_info)
    {
        $full_net_price = 0;
        $full_sell_price = 0;
        // Loop over each drug
        foreach ($drugs_info as $drug_info) {
            // Grap the required drug information
            $drug_id = $drug_info[0];
            $drug = Drug::find($drug_id);
            $drug_packages_number = $drug_info[1];
            $drug_units_number = $drug_info[2];
            $drug_exp_date = $drug_info[3];
            $drug_pro_date = $drug_info[4];
            $drug_package_sell_price = $drug_info[5];
            $drug_package_net_price = $drug_info[6];
            $drug_unit_sell_price = $drug_info[7];
            $drug_unit_net_price = $drug_info[8];

            // Initiate a new drug repo instance
            $drug_repo = new DrugsRepo;

            // Manipulate the quantity and prices
            if ($drug_units_number != null) {
                $drug_repo->packages_number = (int) ($drug_units_number / $drug->unit_number);
                $drug_repo->units_number = $drug_units_number;
                $drug_repo->unit_sell_price = $drug_unit_sell_price;
                $drug_repo->unit_net_price = $drug_unit_net_price;
                if ($drug_package_sell_price != null) {
                    $drug_repo->package_sell_price = $drug_package_sell_price;
                }
                else {
                    $drug_repo->package_sell_price = $drug_units_number * $drug_unit_sell_price;
                }
                if ($drug_package_net_price != null) {
                    $drug_repo->package_net_price = $drug_package_net_price;
                }
                else {
                    $drug_repo->package_net_price = $drug_units_number * $drug_unit_net_price;
                }
            }
            else {
                $drug_repo->packages_number = $drug_packages_number;
                $drug_repo->units_number = $drug_packages_number * $drug->unit_number;
                $drug_repo->package_sell_price = $drug_package_sell_price;
                $drug_repo->package_net_price = $drug_package_net_price;
                $drug_repo->unit_sell_price = (int) $drug_package_sell_price / $drug->unit_number;
                $drug_repo->unit_net_price = (int) $drug_package_net_price / $drug->unit_number;
            }

            // EXP and PRO dates
            $drug_repo->exp_date = $drug_exp_date;
            $drug_repo->pro_date = $drug_pro_date;

            @// TODO: Update DrugsRepo table

            // Check for new prices
            if ($drug_new_sell_price != null) {
                $drug_repo->sell_price = $drug_new_sell_price;
            } else {
                $drug_repo->sell_price = $drug->sell_price;
            }
            if ($drug_new_net_price != null) {
                $drug_repo->net_price = $drug_new_net_price;
            } else {
                $drug_repo->net_price = $drug->net_price;
            }

            // Puclish the new attributes to the repo
            $drug_repo->save();
            $drug_repo->drug()->save($drug);

            // Update the result prices
            $full_net_price += $drug_repo->net_price;
            $full_sell_price += $drug_repo->sell_price;
        }

        // Return the final result
        $result = [];
        array_push($result, $full_net_price, $full_sell_price);
        return $result;
    }
}
