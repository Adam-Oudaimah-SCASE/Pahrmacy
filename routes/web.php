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
//Route::get('drugs/addDrug', 'DrugController@create')->name('addDrug');
//Route::post('drugs/addDrug', 'DrugController@store')->name('storeDrug');

Route::resource('drugs', 'DrugController');

// Company Routes
Route::resource('company', 'CompanyController');


// Shape Routes
Route::resource('shape', 'DrugShapeController');


// Category Routes
Route::resource('category', 'DrugCategoryController');


// WareHouses Routes
Route::resource('warehouse', 'WareHouseController');