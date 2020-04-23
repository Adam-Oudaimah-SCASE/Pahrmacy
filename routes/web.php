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

// AccountingType Route
Route::resource('accountingType', 'AccountingTypeController')->except(['show']);

// AccountingOperation Route
Route::resource('accountingOperation', 'AccountingOperationController')->except(['show']);

// Invoice Routes
// Invoices list
Route::get('/invoices', 'InvoiceController@get_sell_invoices')->name('invoice.index');
// Create a new sell invoice view
Route::get('/invoices/createInvoice', 'InvoiceController@create_sell_invoice')->name('invoice.create');
// Create a new sell invoice with insurance view
Route::get('/invoices/createInsuranceInvoice', 'InvoiceController@create_sell_invoice_insurance')->name('invoice.create_with_insurance');
// Store the new invoice
Route::post('/invoices/createInvoice', 'InvoiceController@store_invoice')->name('invoice.store');
// Payment for an invoice
Route::post('/invoices/createInvoice/pay', 'InvoiceController@handle_accounting')->name('invoice.pay');
// Show invoice
Route::get('/invoices/show/{invoice_id}', 'InvoiceController@show_sell_invoice')->name('invoice.show');
// Payment view for an invoice
Route::get('/invoices/payment/{invoice_id}', 'InvoiceController@pay_for_invoice')->name('invoice.payment');
// Pay for an invoice
Route::post('/invoices/payment/{invoice_id}', 'InvoiceController@do_pay_for_invoice')->name('invoice.dopay');
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
// Drugs filtering
Route::post('/drugs/filter', 'DrugController@filter')->name('drug.filter');
// Create a new Drug View
Route::get('/drugs/create', 'DrugController@create')->name('drug.create');
// Store a new Drug
Route::post('/drugs/create', 'DrugController@store')->name('drug.store');
// Show Drug details
Route::get('/drugs/show/{id}', 'DrugController@show')->name('drug.show');
// Edit Drug Repo details
Route::get('/drugs/edit/{id}', 'DrugController@edit')->name('drug.edit');
// Edit Drug details
Route::get('/drugs/editDrug/{id}', 'DrugController@editDrug')->name('drug.editDrug');
// Update Drug Repo Details
Route::post('/drugs/update/{id}', 'DrugController@update')->name('drug.update');
// Update Drug Details
Route::post('/drugs/updateDrug/{id}', 'DrugController@update_drug')->name('drug.updateDrug');
// Calculate the net and sell prices
Route::post('/drugs/calculate', 'DrugController@calculate_prices')->name('drug.calculate');

// Perscription  routes
Route::get('/prescriptions', 'PrescriptionController@index')->name('prescription.index');
Route::get('/prescriptions/create', 'PrescriptionController@create')->name('prescription.create');
Route::post('/prescriptions/create', 'PrescriptionController@store')->name('prescription.store');
Route::get('/prescriptions/{id}', 'PrescriptionController@show')->name('prescription.show');
Route::get('/prescriptions/sell/{id}/{amount}', 'PrescriptionController@sell_prescription')->name('prescription.sell');

// Techsupport routes
Route::get('techsupport', function () {
    return view('techsupport');
});

// About us routes
Route::get('aboutus', function () {
    return view('aboutus');
});

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

// Reports Routes
// Report Index
Route::get('reports', function () {
    return view('reports.index');
})->name('report.index');
// Filter the reports
Route::get('reports/filter', 'ReportController@filter')->name('report.filter');
// Categories report
Route::get('reports/category/{category_id}', 'ReportController@category_report')->name('report.category');
// Categories sales report
Route::get('reports/category/sales/{category_id}', 'ReportController@category_sales_report')->name('report.category.sales');
// Companies report
Route::get('reports/companies', 'ReportController@companies_report')->name('report.companies');
// Companies sales report
Route::get('reports/companies/sales', 'ReportController@companies_sales_report')->name('report.companies.sales');
// Daily sales report
Route::get('reports/daily/sales', 'ReportController@daily_sales_report')->name('report.daily.sales');
// Eraning and budget report
Route::get('reports/earnings', 'ReportController@earnings_report')->name('report.earnings');
// Orders report
Route::get('reports/orders', 'ReportController@orders_report')->name('report.orders');
// Expenses report
Route::get('reports/expenses', 'ReportController@expenses_report')->name('report.expenses');
// Expired drugs report
Route::get('reports/expired', 'ReportController@expired_drug_report')->name('report.expired');
// WareHouses report
Route::get('reports/warehouses', 'ReportController@warehouses_report')->name('report.warehouses');

// Roles Routes
Route::resource('roles', 'RoleController');
Route::resource('users', 'UserController');
