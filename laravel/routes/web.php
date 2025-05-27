<?php

use Illuminate\Support\Facades\Route;


Route::view('/', 'index');
Route::view('/about', 'about');
Route::view('/services', 'services');
Route::view('/doctors', 'doctors');
Route::view('/contact', 'contact');

