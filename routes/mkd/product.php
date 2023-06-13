<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Offer\OfferController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\ProductAllergenController;
use App\Http\Controllers\Product\ProductDescriptionController;

Route::resource('products', ProductController::class);
Route::resource('products.offers', OfferController::class);
Route::resource('products.descriptions', ProductDescriptionController::class);
Route::resource('products.allergens', ProductAllergenController::class);