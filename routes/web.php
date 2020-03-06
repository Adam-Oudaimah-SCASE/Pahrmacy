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

// Company Routes
Route::resource('company', 'CompanyController')->except(['show']);

// Shape Routes
Route::resource('shape', 'DrugShapeController')->except(['show']);

// Category Routes
Route::resource('category', 'DrugCategoryController')->except(['show']);

// WareHouses Routes
Route::resource('warehouse', 'WareHouseController')->except(['show']);

// Insurnce Company Routes
Route::resource('insurnce-company', 'InsuranceCompanyController')->except(['show']);

// Invoice Routes
// Invoices list
Route::get('/invoices', 'InvoiceController@get_sell_invoices')->name('invoice.index');
// Create a new sell invoice view
Route::get('/invoices/createInvoice', 'InvoiceController@create_sell_invoice')->name('invoice.create');
// Create a new sell invoice with insurnce view
Route::get('/invoices/createInsuranceInvoice', 'InvoiceController@create_sell_invoice_insurance')->name('invoice.create_with_insurance');
// Store the new invoice
Route::post('/invoices/createInvoice', 'InvoiceController@store_invoice')->name('invoice.store');
// Bayment for an invoice
Route::post('/invoices/createInvoice/pay', 'InvoiceController@handle_accounting')->name('invoice.pay');
// Search for drugs (AJAX request for Select2)
Route::get('/drugs/search', 'DrugController@search_drugs')->name('drug.search');
// Get drug repo by drug ID (after selecting fom a Select2 event)
Route::get('/drugs/repo/sell', 'DrugController@get_drug_repo_by_id_for_sell')->name('drug.get_repo_by_id_for_sell');
// Get drug by drug ID (after selecting fom a Select2 event)
Route::get('/drugs/search/prescription', 'DrugController@get_drug_by_id_for_prescription')->name('drug.get_drug_by_id_for_prescription');

// Order routes
// View all orders
Route::get('/orders', 'InvoiceController@get_all_orders')->name('order.index');
// Create a new order
Route::get('/orders/createOrder', 'InvoiceController@create_buy_order_invoice')->name('order.create');
// Get drug repo by drug ID (after selecting fom a Select2 event)
Route::get('/drug/repo/order', 'DrugController@get_drug_repo_by_id_for_order')->name('drug.get_repo_by_id_for_order');
// Receive Form
Route::get('/orders/receive/{order_id}', 'InvoiceController@create_order_receive_invoice')->name('order.receive');
// Show Order
Route::get('/orders/show/{order_id}', 'InvoiceController@show_order')->name('order.show');

// Drugs and Drugs Repo Routes
// Drugs list
Route::get('/drugs', 'DrugController@index')->name('drug.index');
// Create a new Drug View
Route::get('/drugs/create', 'DrugController@create')->name('drug.create');
// Store a new Drug
Route::post('/drugs/create', 'DrugController@store')->name('drug.store');

// Perscription  routes
Route::get('/prescriptions', 'PrescriptionController@index')->name('prescription.index');
Route::get('/prescriptions/create', 'PrescriptionController@create')->name('prescription.create');
Route::post('/prescriptions/create', 'PrescriptionController@store')->name('prescription.store');
Route::get('/prescriptions/{id}', 'PrescriptionController@show')->name('prescription.show');
Route::post('/prescriptions/calculate', 'PrescriptionController@calculate_request')->name('prescription.calculate');
Route::get('/prescriptions/sell/{id}/{amount}', 'PrescriptionController@sell_prescription')->name('prescription.sell');


// Report routes
Route::get('report', function () {
    return view('reports/categoryReport');
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

// To test reports (Please do not delete these routes)
Route::get('reports/category/{category_id}', 'ReportController@drugs_categories_report')->name('report.category');
