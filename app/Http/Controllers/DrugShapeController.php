<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DrugShape;

class DrugShapeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all the shapes
        $shapes = DrugShape::all();
        // Return the appropriate view
        return view('shape')->withShapes($shapes);
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
        // Create a new object of DrugShape
        $shape = new DrugShape;

        // Assign the request values to the new shape
        $shape->name = $request->input('name');

        // Save the new shape
        $shape->save();

        // Get all the shapes
        $shapes = DrugShape::all();
        // Return the appropriate view
        return view('shape')->withShapes($shapes);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get the targeted shape
        $shape = DrugShape::find($id);
        // Return the appropriate view
        return view('')->withShape($shape);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get the targeted shape
        $shape = DrugShape::find($id);
        // Return the appropriate view
        return view('')->withShape($shape);
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
        // Get the targeted shape
        $shape = DrugShape::find($id);

        // Update the name of the category
        $shape->name = $request->input('name');

        // Save the updates
        $shape->save();

        // Get all the shapes
        $shapes = DrugShape::all();
        // Return the appropriate view
        return view('')->withShapes($shapes);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get the targeted shape
        $shape = DrugShape::find($id);

        // Delete the record
        $shape->delete();

        // Get all the shapes
        $shapes = DrugShape::all();
        // Return the appropriate view
        return view('')->withShapes($shapes);
    }
}
