<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DinosaurController;

Route::resource('dinosaurs', DinosaurController::class);
