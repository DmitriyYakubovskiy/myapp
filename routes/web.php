<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DinosaurController;

Route::redirect('/', '/dinosaurs');
Route::resource('dinosaurs', DinosaurController::class);
