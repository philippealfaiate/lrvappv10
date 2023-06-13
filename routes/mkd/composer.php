<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Composer\ComposerController;
use App\Http\Controllers\Composer\ComposerElementController;

Route::resource('composers', ComposerController::class);
Route::resource('composers.elements', ComposerElementController::class);