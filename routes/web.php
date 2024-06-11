<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\HariController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('agenda', AgendaController::class);
Route::resource('hari', HariController::class);