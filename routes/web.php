<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard_accounting_controller;

Route::get('/',[dashboard_accounting_controller::class, 'show']);

Route::get('/dashboard_accounting',[dashboard_accounting_controller::class, 'show']);

Route::get('/dashboard_supplier', function () {
    return view('accounting.dashboard_supplier');
});

Route::get('/dashboard_customer', function () {
    return view('accounting.dashboard_customer');
});

Route::get('/dashboard_barang', function () {
    return view('accounting.dashboard_barang');
});

Route::get('/dashboard_pbs', function () {
    return view('accounting.dashboard_pbs');
});

Route::get('/dashboard_cashier', function () {
    return view('dashboard_cashier');
});