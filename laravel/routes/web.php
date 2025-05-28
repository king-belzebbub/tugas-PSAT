<?php

use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
});

Route::resource('dokter', DokterController::class);
