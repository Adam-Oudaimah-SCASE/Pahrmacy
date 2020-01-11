<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Drug;
use App\Models\DrugShape;
use App\Models\DrugCategory;
use App\Models\DrugsRepo;
use App\Models\Company;

// TODO: Add validation check to the passed parameters, but not all parameters because in some cases some of them could be null.

class DrugController extends Controller
{
    /**
     * Helper method to get all the drugs and its detials from the repo.
     *
     * @return List All the drugs with all its details
     */
    // TODO: No need to get all drug details from the repo, only needed when pressing on the drug
    public function get_drugs_details()
    {
        return DB::table('drugs')->get();
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
        return $drug->repo()->get();
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
        return view('drugs')->withDrugs($drugs);
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
        $drugs = Drug::all();
        $shapes = DrugShape::all();
        $companies = Company::all();
         return view('addDrug')->with([
             'categories' => $categories,
             'shapes' => $shapes,
             'companies' => $companies,
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
        $drug->lic_palte = $request->input('lic_palte');
        $drug->local_barcode = $request->input('local_barcode');
        $drug->global_barcode = $request->input('global_barcode');

        // Associate the foreign keys
        $drug->company()->associate(Company::find($request->input('company_id')));
        $drug->category()->associate(DrugCategory::find($request->input('category_id')));
        $drug->shape()->associate(DrugShape::find($request->input('shape_id')));

        // Save the new drug
        $drug->save();

        // Assign the default unit number for this drug
        $drug_repo->unit_number = $request->input('unit_number');
        // Add the appropriate drugs repo record
        $drug_repo->pro_date = $request->input('pro_date');
        $drug_repo->exp_date = $request->input('exp_date');

        // Check if units are inserted
        if ($request->input('units_number') != null || $request->input('units_number') != "0") {
            $drug_repo->packages_number = (int) ($request->input('units_number') / $drug_repo->unit_number);
            $drug_repo->units_number = $request->input('units_number');
        }
        else {
            $drug_repo->packages_number = $request->input('packages_number');
            $drug_repo->units_number = $request->input('packages_number') * $drug_repo->unit_number;
        }

        // Set the prices
        $drug_repo->package_sell_price = $request->input('package_sell_price');
        if ($request->input('unit_sell_price') == null || str($request->input('unit_sell_price')) == "0") {
            $drug_repo->unit_sell_price = (int)$drug_repo->package_sell_price / $drug_repo->unit_number;
        } else {
            $drug_repo->unit_sell_price = $request->input('unit_sell_price');
        }
        $drug_repo->package_net_price = $request->input('package_net_price');
        if ($request->input('unit_net_price') == null || str($request->input('unit_net_price')) == "0") {
            $drug_repo->unit_net_price = (int)$drug_repo->package_net_price / $drug_repo->unit_number;
        } else {
            $drug_repo->unit_net_price = $request->input('unit_net_price');
        }

        // Puclish the new attributes to the repo and bind it with the appropriate drug
        $drug_repo->drug()->associate($drug);
        $drug_repo->save();

        // Get all the drugs
        $drugs = $this->get_drugs_details();
        // Return the appropriate view
        return view('drugs')->withDrugs($drugs);
    }

    /**
    * Update the repo when a sell invoice is generated.
    * The update will happen on the oldest drug repo (according to the expiration date).
    * The passed drugs info will be a list of lists.
    * Each element of this list contains the following information:
    * [Drug ID, Packages number, Units number, New package sell price, New unit sell price]
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
          $drug_package_new_sell_price = $drug_info[3];
          $drug_unit_new_sell_price = $drug_info[4];

          // Manipulate the quantity and the price
          if ($drug_units_number != null) {
              $drug_repo->packages_number -= (int) ($drug_units_number / $drug->unit_number);
              $drug_repo->units_number -= $drug_units_number;
              $full_net_price += $drug_repo->unit_net_price * $drug_units_number;
              if ($drug_unit_new_sell_price != null) {
                  $full_sell_price += $drug_units_number * $drug_unit_new_sell_price;
              } else {
                  $full_sell_price += $drug_units_number * $drug_repo->unit_sell_price;
              }
          }
          else {
              $drug_repo->packages_number -= $drug_packages_number;
              $drug_repo->units_number -= $drug_packages_number * $drug_repo->unit_number;
              $full_net_price += $drug_repo->package_net_price * $drug_packages_number;
              if ($drug_package_new_sell_price != null) {
                  $full_sell_price += $drug_packages_number * $drug_package_new_sell_price;
              } else {
                  $full_sell_price += $drug_packages_number * $drug_repo->package_sell_price;
              }
          }

          // Puclish the new attributes to the repo
          $drug_repo->drug()->associate($drug);
          $drug_repo->save();
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
     * [Drug ID, Unit number, Packages number, Units number, Expiration date, Production date, Package Sell price, Package Net price, Unit Sell price, Unit Net price]
     *
     * @return boolean True if storing all the new quantites completed successuly, unhandled exception otherwise
     */
    public function update_drugs_repo_from_incoming_invoice($drugs_info)
    {
        // Loop over each drug
        foreach ($drugs_info as $drug_info) {
            // Grap the required drug information
            $drug_id = $drug_info[0];
            $drug = Drug::find($drug_id);
            $drug_unit_number = $drug_info[1];
            $drug_packages_number = $drug_info[2];
            $drug_units_number = $drug_info[3];
            $drug_exp_date = $drug_info[4];
            $drug_pro_date = $drug_info[5];
            $drug_package_sell_price = $drug_info[6];
            $drug_package_net_price = $drug_info[7];
            $drug_unit_sell_price = $drug_info[8];
            $drug_unit_net_price = $drug_info[9];

            // Initiate a new drug repo instance
            $drug_repo = new DrugsRepo;

            // Manipulate the quantity and prices
            if ($drug_units_number != null) {
                $drug_repo->packages_number = (int) ($drug_units_number / $drug_repo->unit_number);
                $drug_repo->units_number = $drug_units_number;
            }
            else {
                $drug_repo->packages_number = $drug_packages_number;
                $drug_repo->units_number = $drug_unit_number * $drug_repo->packages_number;
            }
            // Set the prices
            if ($drug_package_sell_price != null) {
                $drug_repo->package_sell_price = $drug_package_sell_price;
                if ($drug_unit_sell_price == null) {
                    $drug_repo->unit_sell_price = (int)$drug_repo->package_sell_price / $drug_repo->unit_number;
                } else {
                    $drug_repo->unit_sell_price = $drug_unit_sell_price;
                }
            }
            if ($drug_package_net_price != null) {
                $drug_repo->package_net_price = $drug_package_net_price;
                if ($drug_unit_net_price == null) {
                    $drug_repo->unit_net_price = (int)$drug_repo->package_net_price / $drug_repo->unit_number;
                } else {
                    $drug_repo->unit_net_price = $drug_unit_net_price;
                }
            }

            // Puclish the new attributes to the repo
            $drug_repo->drug()->associate($drug);
            $drug_repo->save();
        }
        return true;
    }
}
