<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Drug Routes
Route::get('drugs/addDrug', 'DrugController@create')->name('addDrug');
Route::post('drugs/addDrug', 'DrugController@store')->name('storeDrug');


// Company Routes
Route::resource('company', 'CompanyController');
Route::get('addCompany', function () {
    return view('addCompany');
});

// Shape Routes
Route::resource('shape', 'DrugShapeController');
Route::get('addShape', function () {
    return view('addShape');
});

// Category Routes
Route::resource('category', 'DrugCategoryController');
Route::get('addCategory', function () {
    return view('addCategory');
});

//invoice Routes
Route::get('invoice', function () {
    return view('invoice');
});

//report routes

Route::get('report', function () {
    return view('report');
});

//techsupport routes

Route::get('techsupport', function () {
    return view('techsupport');
});

//about us routes

Route::get('aboutus', function () {
    return view('aboutus');
});
