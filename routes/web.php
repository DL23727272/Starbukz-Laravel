<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ModalController;

Route::get('/', function () {
    return view('index');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/cart', function(){
    return view('cart');
});

//Fetch Products
Route::get('/home', [ProductController::class, 'product']);

//Modal
Route::get('/modal', [ModalController::class, 'modals'])->name('modal');
