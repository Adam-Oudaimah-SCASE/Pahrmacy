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
// Create a new sell invoice view
Route::get('/invoices/createInvoice', 'InvoiceController@create_sell_invoice')->name('invoice.create');
// Store the new invoice
Route::post('/invoices/createInvoice', 'InvoiceController@store_invoice')->name('invoice.store');
// Bayment for an invoice
Route::post('/invoices/createInvoice/pay', 'InvoiceController@handle_accounting')->name('invoice.pay');
// Search for drugs (AJAX request for Select2)
Route::get('/invoices', 'DrugController@search_drugs')->name('drug.search');
// Get drug repo by drug ID (after selecting fom a Select2 event)
Route::get('/drug/repo', 'DrugController@get_drug_repo_by_id')->name('drug.get_repo_by_id');

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Order routes
Route::get('/orders/createOrder', 'InvoiceController@create_buy_order_invoice')->name('order.create');

Route::get('receiveOrder', function () {
    return view('order.receiveOrder');
});
Route::get('receive', function () {
    return view('order.receive');
});
Route::get('/saveOrder', 'InvoiceController@store_invoice');
