<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Shop\ShopController;
use App\Http\Controllers\Account\AccountController;

Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');

Route::middleware('auth')->group(function () {
    Route::get('/account', [AccountController::class, 'dashboard'])->name('account.dashboard');
});
