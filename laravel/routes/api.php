<?php

use App\Http\Controllers\Kunjungancontroller;
use App\Http\Controllers\Tindakancontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pasiencontroller;
use App\Http\Controllers\Doktercontroller;

Route::apiResource('pasien', pasiencontroller::class);
Route::apiResource('dokter', Doktercontroller::class);
Route::apiResource('tindakan', controller: Tindakancontroller::class);
Route::apiResource('kunjungan', Kunjungancontroller::class);
Route::post('/kunjungans/{kunjungan}/add-Tindakan', [Tindakancontroller::class, 'addTreatment']);
Route::put('/pasien/{id}', [PasienController::class, 'update']);
Route::patch('/pasien/{id}', [PasienController::class, 'update']);
Route::delete('/pasien/{id}', [PasienController::class, 'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
