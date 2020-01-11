<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DrugCategory;

class DrugCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all the categories
        $categories = DrugCategory::all();
        // Return the appropriate view
        return view('category')->withCategories($categories);
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
        // Create a new object of DrugCategory
        $category = new DrugCategory;

        // Assign the request values to the new category
        $category->name = $request->input('name');

        // Save the new category
        $category->save();

        // Get all the categories
        $categories = DrugCategory::all();
        // Return the appropriate view
        return view('category')->withCategories($categories);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get the targeted category
        $category = DrugCategory::find($id);
        // Return the appropriate view
        return view('')->withCategory($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get the targeted category
        $category = DrugCategory::find($id);
        // Return the appropriate view
        return view('')->withCategory($category);
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
        // Get the targeted category
        $category = DrugCategory::find($id);

        // Update the name of the category
        $category->name = $request->input('name');

        // Save the updates
        $category->save();

        // Get all the categories
        $categories = DrugCategory::all();
        // Return the appropriate view
        return view('')->withCategories($categories);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get the targeted category
        $category = DrugCategory::find($id);

        // Delete the record
        $category->delete();

        // Get all the categories
        $categories = DrugCategory::all();
        // Return the appropriate view
        return view('')->withCategories($categories);
    }
}
