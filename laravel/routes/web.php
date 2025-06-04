<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\TindakanController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\Detail_TindakanController;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Tindakan;
use App\Models\Kunjungan;
use App\Models\Detail_Tindakan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama
route::get('/', function (){
    return view('index');
});
// Form tambah data (jika ada form khusus)
Route::get('/tambah', function () {
    return view('tambah');
});

/*
|--------------------------------------------------------------------------
| Dokter
|--------------------------------------------------------------------------
*/
Route::resource('dokter', DokterController::class)->only(['index', 'store', 'create', 'update', 'destroy']);
Route::get('/dokter', function () {
    $dokters = Dokter::all();
    return view('dokter', compact('dokters'));
});

/*
|--------------------------------------------------------------------------
| Pasien
|--------------------------------------------------------------------------
*/
Route::resource('pasien', PasienController::class)->only(['index', 'store', 'create', 'update', 'destroy']);
Route::get('/pasien', function () {
    $pasiens = Pasien::all();
    return view('pasien', compact('pasiens'));
});

/*
|--------------------------------------------------------------------------
| Tindakan
|--------------------------------------------------------------------------
*/
Route::resource('tindakan', TindakanController::class)->only(['index', 'store', 'create', 'update', 'destroy']);
Route::get('/tindakan', function () {
    $tindakans = Tindakan::all();
    return view('tindakan', compact('tindakans'));
});

/*
|--------------------------------------------------------------------------
| Kunjungan
|--------------------------------------------------------------------------
*/
Route::resource('kunjungan', KunjunganController::class)->only(['index', 'store', 'create', 'update', 'destroy']);
Route::get('/kunjungan', [KunjunganController::class, 'index'])->name('kunjungan.index');

/*
|--------------------------------------------------------------------------
| Detail Tindakan
|--------------------------------------------------------------------------
*/
Route::resource('detail_tindakan', Detail_TindakanController::class)->only(['index', 'store', 'create', 'update', 'destroy']);
Route::get('/detail_tindakan', function () {
    $detail_tindakans = Detail_Tindakan::all();
    return view('detail_tindakan', compact('detail_tindakans'));
});
