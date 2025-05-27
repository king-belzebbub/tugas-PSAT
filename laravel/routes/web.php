<?php

use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
});


Route::get('/pasien', [PasienController::class, 'index']);
