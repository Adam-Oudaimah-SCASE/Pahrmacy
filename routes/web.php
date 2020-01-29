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

Route::resource('drugs', 'DrugController');

// Company Routes
Route::resource('company', 'CompanyController');

// Shape Routes
Route::resource('shape', 'DrugShapeController');

// Category Routes
Route::resource('category', 'DrugCategoryController');

// WareHouses Routes
Route::resource('warehouse', 'WareHouseController');

// Invoice Routes
Route::get('invoice', function () {
    return view('invoice');
});

// Report routes
Route::get('report', function () {
    return view('report');
});

// Techsupport routes
Route::get('techsupport', function () {
    return view('techsupport');
});

// About us routes
Route::get('aboutus', function () {
    return view('aboutus');
});
