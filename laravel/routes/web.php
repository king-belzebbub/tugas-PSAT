<?php

use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Models\Dokter;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/tambah', function () {
    return view('tambah');
});

Route::resource('dokter', DokterController::class);

Route::get('/dokter', function () {
    $dokters = Dokter::all(); // Ambil semua data dari tabel `dokters`
    return view('dokter', compact('dokters'));
});
