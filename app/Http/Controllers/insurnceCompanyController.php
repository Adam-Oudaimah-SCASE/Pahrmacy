<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InsuranceCompany;

class insurnceCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all the companies
        $inscompanies = InsuranceCompany::all();
        // Return the appropriate view
        return view('insurnce-company.index')->withInscompanies($inscompanies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return the appropriate view
        return view('insurnce-company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create a new object of Company
        $insurncecompanies = new InsuranceCompany;

        // Assign the request values to the new company
        $insurncecompanies->name = $request->input('name');
        $insurncecompanies->address = $request->input('address');
        $insurncecompanies->phone = $request->input('phone');
         $insurncecompanies->email = $request->input('email');
        $insurncecompanies->discount = $request->input('discount');

        // Save the new company
        $insurncecompanies->save();

        // Return the appropriate view
        return redirect()->route('insurnce-company.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get the targeted company
        $inscompanies = InsuranceCompany::find($id);
        // Return the appropriate view
        return view('insurnce-company.edit')->withInscompanies($inscompanies);
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
        // Create a new object of Company
        $insurncecompanies = InsuranceCompany::find($id);

        // Assign the request values to the new company
        $insurncecompanies->name = $request->input('name');
        $insurncecompanies->address = $request->input('address');
        $insurncecompanies->phone = $request->input('phone');
         $insurncecompanies->email = $request->input('email');
        $insurncecompanies->discount = $request->input('discount');

        // Save the new company
        $insurncecompanies->save();

        // Return the appropriate view
        return redirect()->route('insurnce-company.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get the targeted company
        $inscompanies = InsuranceCompany::find($id);

        // Delete the record
        $inscompanies->delete();

        // Return the appropriate view
        return redirect()->route('insurnce-company.index');
    }
}
