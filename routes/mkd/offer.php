<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Offer\OfferController;
use App\Http\Controllers\Offer\OfferComposerController;
use App\Http\Controllers\Offer\OfferComposerElementController;

Route::resource('products.offers', OfferController::class);
Route::resource('products.offers.composers', OfferComposerController::class);
Route::resource('products.offers.composers.elements', OfferComposerElementController::class);
