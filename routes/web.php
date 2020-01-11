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
Route::resource('drugs', 'DrugController');



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