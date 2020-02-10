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
// Drugs Routes
Route::resource('drugs', 'DrugController');

// Company Routes
Route::resource('company', 'CompanyController')->except(['show']);

// Shape Routes
Route::resource('shape', 'DrugShapeController')->except(['show']);

// Category Routes
Route::resource('category', 'DrugCategoryController')->except(['show']);

// WareHouses Routes
Route::resource('warehouse', 'WareHouseController')->except(['show']);

// Invoice Routes
Route::get('invoice', function () {
    return view('invoice.invoice');
});
Route::get('createinvoice', function () {
    return view('invoice.createinvoice');
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
// Order routes
Route::get('createOrder', function () {
    return view('order.createOrder');
});
Route::get('receiveOrder', function () {
    return view('order.receiveOrder');
});
Route::get('receive', function () {
    return view('order.receive');
});
Route::get('/saveOrder', 'InvoiceController@store_invoice');