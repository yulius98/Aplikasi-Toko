<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard_accounting');
});

Route::get('/dashboard_supplier', function () {
    return view('accounting.dashboard_supplier');
});

Route::get('/dashboard_accounting', function () {
    return view('dashboard_accounting');
});

route::get('/dashboard_barang', function () {
    return view('accounting.dashboard_barang');
});
route::get('/dashboard_pbs', function () {
    return view('accounting.dashboard_pbs');
});