<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpecialCustomer;
use App\Models\Drug;
use App\Models\Prescription;
use App\Models\DrugPrescription;
use App\Models\InsuranceCompany;
use App\Http\Controllers\DrugController;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all the special customers
        $prescriptions = Prescription::all();
        // Return the appropriate view
        return view('prescription.index')->withPrescriptions($prescriptions);
    }

    public function show($id){

      $prescriptions = Prescription::find($id);
      return View('prescription.prescription')


          ->with('prescriptions', $prescriptions )


          ;
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get all the special customers
        $customers = SpecialCustomer::all();
        // Return the appropriate view
        return view('prescription.create')->withCustomers($customers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create a new prescription
        $prescription = new Prescription;

        // Associate it with a special customer
        $customer_id = $request->input('customer_id');
        $customer = SpecialCustomer::find($customer_id);
        $prescription->associate($customer);

        // Asscosiate with an insurance company if available
        $discount_percentage = 0;
        if ($request->input('insurance_company_id') != null || $request->input('insurance_company_id') != '') {
            $insurance_company_id = $request->input('insurance_company_id');
            $insurance_company = InsuranceCompany::find($insurance_company_id);
            $discount_percentage = $insurance_company->discount_percentage / 100;
            $prescription->associate($insurance_company);
        }

        // Set to zeros temporarily until calculation the prices
        $prescription->net_price = 0;
        $prescription->sell_price = 0;
        $prescription->sell_price_after_discount = 0;

        // Save to generate the prescription ID
        $prescription->save();

        // Get all required drugs info
        $drugs_ids = $request->input('drugs.ids.*');
        $drugs_packages_number = $request->input('drugs.packages_number.*');
        $drugs_units_number = $request->input('drugs.units_number.*');
        $drugs_package_sell_price = $request->input('drugs.package_sell_price.*');
        $drugs_unit_sell_price = $request->input('drugs.unit_sell_price.*');

        // Variables to holds the net and sell prcies of the whole prescription
        $full_net_price = 0;
        $full_sell_price = 0;

        // Calculate the prcies
        for ($i=0; $i<count($drugs_ids); $i++) {
            $drug_repo = Drug::find($drugs_ids[$i])->repo->where(['isDisposed', '=', false])->orderBy('exp_date', 'ASC')->first();
            // Manipulate the quantity and the price
            if ($drug_units_number != null) {
                $full_net_price += $drug_repo->unit_net_price * $drug_units_number;
                if ($drug_unit_new_sell_price != null) {
                      $full_sell_price += $drug_units_number * $drug_unit_new_sell_price;
                } else {
                      $full_sell_price += $drug_units_number * $drug_repo->unit_sell_price;
                }
            }
            else {
                $full_net_price += $drug_repo->package_net_price * $drug_packages_number;
                if ($drug_package_new_sell_price != null) {
                    $full_sell_price += $drug_packages_number * $drug_package_new_sell_price;
                } else {
                    $full_sell_price += $drug_packages_number * $drug_repo->package_sell_price;
                }
            }

            // Generate the drug_prescription appropriate records
            $drug_prescription = new DrugPrescription;
            $drug_prescription->drug()->associate(Drug::find($drugs_ids[$i]));
            $drug_prescription->prescription()->associate($prescription);
            $drug_prescription->packages_number = $drugs_packages_number[$i];
            $drug_prescription->units_number = $drugs_units_number[$i];
            $drug_prescription->package_sell_price = $drugs_package_sell_price[$i];
            $drug_prescription->unit_sell_price = $drugs_unit_sell_price[$i];
            $drug_prescription->save();
        }

        // Assign the calculated prcies to the prescription
        $prescription->net_price = $full_net_price;
        $prescription->sell_price = $full_sell_price;
        $discount_amount = $full_sell_price * ($discount_percentage);
        $prescription->sell_price_after_discount = $prescription->sell_price - $discount_amount;
        $prescription->save();

        // Return the appropriate view
        return redirect()->route('prescription.index');
    }

    /**
    * Sell a prescription to a special customer.
    */
    public function sell_prescription($prescription_id, $amount)
    {
        // Drugs info
        // Each element will have the following struture
        // [Drug ID, Packages number, Units number]
        $drugs_info = array();

        // Find the prescription
        $prescription = Prescription::find($prescription_id);

        // Create each list entry of the drugs list
        foreach ($prescription->drugs as $drug) {
            $drug_info = array($drug->id, $drug->pivot->packages_number, $drug->pivot->units_number);
            array_push($drugs_info, $drug_info);
        }

        // Initiate the drugs reposotray controller
        $repo_controller = new DrugController;
        $repo_controller->update_drugs_repo_from_prescription_invoice($drugs_info);

        // Create the appropriate accounting operation
        $accounting_type = AccountingType::where('name', 'فاتورة زبون')->first();
        $accounting_operation = new AccountingOperation;
        $accounting_operation->date = $request->input('date') == null ? date('Y-m-d H:i:s') : $request->input('date');
        $accounting_operation->amount = $amount;
        $accounting_operation->type()->associate($accounting_type);
        $accounting_operation->operationable()->associate($prescription);
        $accounting_operation->save();

        // Add it to the balance table
        $balance = Balance::first();
        $balance->balance += $amount;
        $balance->save();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get the targeted prescription
        $prescription = Prescription::find($id);
        // Return the appropriate view
        return view('prescription.edit')->withPrescription($prescription);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Get the targeted prescription
        $prescription = Prescription::find($id);

        if($request->input('customer_id') != $prescription->customer->id){
            $customer_id = $request->input('customer_id');
            $customer = SpecialCustomer::find($customer_id);
            // Associate it with a special customer
            $prescription->associate($customer);
        }

        $discount_percentage = $prescription->insurance_company->discount_percentage;
        // Asscosiate with an insurance company if available
        if ($request->input('insurance_company_id') != $prescription->insurance_company->id) {
            $insurance_company_id = $request->input('insurance_company_id');
            $insurance_company = InsuranceCompany::find($insurance_company_id);
            $discount_percentage = $insurance_company->discount_percentage / 100;
            $prescription->associate($insurance_company);
        }
        $prescription->save();

        $drugs_ids = $request->input('drugs.ids.*');
        $drugs_packages_number = $request->input('drugs.packages_number.*');
        $drugs_units_number = $request->input('drugs.units_number.*');
        $drugs_package_sell_price = $request->input('drugs.package_sell_price.*');
        $drugs_unit_sell_price = $request->input('drugs.unit_sell_price.*');

        // TODO: Has to manipulate the edit process in diffirent way that creating

        // Return the appropriate view
        return redirect()->route('prescription.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get the targeted prescription
        $prescription = Prescription::find($id);

        // Delete the record
        $prescription->delete();

        // Return the appropriate view
        return redirect()->route('prescription.index');
    }
}
