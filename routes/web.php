<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AddressController;

require __DIR__.'/auth.php';
require __DIR__.'/challenges.php';

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::post('/address/delete', [AddressController::class, 'delete'])->name('address.delete');
