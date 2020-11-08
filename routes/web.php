<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::redirect('/', 'admin-dash', 301);
Route::redirect('home', 'admin-dash', 301);

Route::group(['middleware' => ['web']], function () {
    Route::get('/admin-dash', 'AdminController@index');

    Route::get('all-users', 'UserController@index');
    Route::get('new-user', 'UserController@create');
    Route::post('new-user', 'UserController@store');
    Route::get('show-user/{id}', 'UserController@show');
    Route::get('/edit-user/{id}', 'UserController@edit');
    Route::post('/update-user/{id}', 'UserController@update');
    Route::get('/delete-user/{id}', 'UserController@destroy');

    //Tenants ROUTES (ADMIN) DEEEEEEVVVVVVVVVVVVVVVVVVEEEEELOPER
    Route::get('all-tenants', 'TenantController@index');
    Route::get('new-tenant', 'TenantController@create');
    Route::post('new-tenant', 'TenantController@store');
    Route::get('show-tenant/{id}', 'TenantController@show');
    Route::get('/edit-tenant/{id}', 'TenantController@edit');
    Route::post('/update-tenant/{id}', 'TenantController@update');
    Route::get('/delete-tenant/{id}', 'TenantController@destroy');

    //Units ROUTES (User) DEEEEEEVVVVVVVVVVVVVVVVVVEEEEELOPER
    Route::get('all-units', 'UnitController@index');
    Route::get('new-unit', 'UnitController@create');
    Route::post('new-unit', 'UnitController@store');
    Route::get('show-unit/{id}', 'UnitController@show');
    Route::get('/edit-unit/{id}', 'UnitController@edit');
    Route::post('/update-unit/{id}', 'UnitController@update');
    Route::get('/delete-unit/{id}', 'UnitController@destroy');

    //VEHICLES ROUTES (User) DEEEEEEVVVVVVVVVVVVVVVVVVEEEEELOPER
    Route::get('all-vehicles', 'VehicleController@index');
    Route::get('new-vehicle', 'VehicleController@create');
    Route::post('new-vehicle', 'VehicleController@store');
    Route::get('show-vehicle/{id}', 'VehicleController@show');
    Route::get('/edit-vehicle/{id}', 'VehicleController@edit');
    Route::post('/update-vehicle/{id}', 'VehicleController@update');
    Route::get('/delete-vehicle/{id}', 'VehicleController@destroy');

    //WATER READINGS ROUTES (User) DEEEEEEVVVVVVVVVVVVVVVVVVEEEEELOPER
    Route::get('readings', 'WaterReadingController@index');
    Route::get('new-reading', 'WaterReadingController@create');
    Route::post('new-reading', 'WaterReadingController@store');
    Route::get('show-reading/{id}', 'WaterReadingController@show');
    Route::get('/edit-reading/{id}', 'WaterReadingController@edit');
    Route::post('/update-reading/{id}', 'WaterReadingController@update');
    Route::get('/delete-reading/{id}', 'WaterReadingController@destroy');


    //Invoices ROUTES (User) DEEEEEEVVVVVVVVVVVVVVVVVVEEEEELOPER
    Route::get('all-invoices', 'InvoiceController@index');
    Route::get('new-invoice', 'InvoiceController@create');
    Route::post('new-invoice', 'InvoiceController@store');
    Route::get('show-invoice/{id}', 'InvoiceController@show');
    Route::get('/edit-invoice/{id}', 'InvoiceController@edit');
    Route::post('/update-invoice/{id}', 'InvoiceController@update');
    Route::get('/delete-invoice/{id}', 'InvoiceController@destroy');


    //RECEIPTS ROUTES (ADMIN) DEEEEEEVVVVVVVVVVVVVVVVVVEEEEELOPER
    Route::get('receipts', 'ReceiptController@index');
    Route::get('new-receipt', 'ReceiptController@create');
    Route::post('new-receipt', 'ReceiptController@store');
    Route::get('/edit-receipt/{id}', 'ReceiptController@edit');
    Route::post('/update-receipt/{id}', 'ReceiptController@update');
    Route::get('/delete-receipt/{id}', 'ReceiptController@destroy');


    //PAYMENTS ROUTES (ADMIN) DEEEEEEVVVVVVVVVVVVVVVVVVEEEEELOPER
    Route::get('all-payments', 'PaymentController@index');
    Route::get('new-payment', 'PaymentController@create');
    Route::post('new-payment', 'PaymentController@store');
    Route::get('show-payment/{id}', 'PaymentController@show');
    Route::get('/edit-payment/{id}', 'PaymentController@edit');
    Route::post('/update-payment/{id}', 'PaymentController@update');
    Route::get('/delete-payment/{id}', 'PaymentController@destroy');
});
