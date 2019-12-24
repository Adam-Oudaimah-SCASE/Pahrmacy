<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WareHouse;

class WareHouseContrller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all the ware houses
        $warehouses = WareHouse::all();
        // Return the appropriate view
        return view('')->withWarehouses($warehouses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return the appropriate view
        return view('');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create a new object of WareHouse
        $warehouse = new WareHouse;

        // Assign the request values to the new ware house
        $warehouse->name = $request->input('name');
        $warehouse->weekly_date = $request->input('weekly_date');
        $warehouse->delegate_name = $request->input('delegate_name');
        $warehouse->phone = $request->input('phone');
        $warehouse->address = $request->input('address');
        $warehouse->email = $request->input('email');
        $warehouse->fax = $request->input('fax');

        // Save the new ware house
        $warehouse->save();

        // Get all the ware houses
        $warehouses = WareHouse::all();
        // Return the appropriate view
        return view('')->withWarehouses($warehouses);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get the targeted ware house
        $warehouse = WareHouse::find($id);
        // Return the appropriate view
        return view('')->withWarehouse($warehouse);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get the targeted ware house
        $warehouse = WareHouse::find($id);
        // Return the appropriate view
        return view('')->withWarehouse($warehouse);
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
        // Get the targeted ware house
        $warehouse = WareHouse::find($id);

        // Update the properties of the company
        $warehouse->name = $request->input('name');
        $warehouse->weekly_date = $request->input('weekly_date');
        $warehouse->delegate_name = $request->input('delegate_name');
        $warehouse->phone = $request->input('phone');
        $warehouse->address = $request->input('address');
        $warehouse->email = $request->input('email');
        $warehouse->fax = $request->input('fax');

        // Save the updates
        $warehouse->save();

        // Get all the ware houses
        $warehouses = WareHouse::all();
        // Return the appropriate view
        return view('')->withWarehouses($warehouses);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get the targeted ware house
        $warehouse = WareHouse::find($id);

        // Delete the record
        $warehouse->delete();

        // Get all the ware houses
        $warehouses = WareHouse::all();
        // Return the appropriate view
        return view('')->withWarehouses($warehouses);
    }
}
