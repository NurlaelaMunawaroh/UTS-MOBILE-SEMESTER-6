<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatkulController;

Route::resource('matkul', MatkulController::class);

Route::get('/', function () {
    return view('welcome');
});
