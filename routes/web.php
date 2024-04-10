<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ModalController;

Route::get('/', function () {
    return view('index');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/cart', function(){
    return view('cart');
});

//Fetch Products
Route::get('/', [ProductController::class, 'product'])->defaults('view', 'index');
Route::get('/home', [ProductController::class, 'product'])->defaults('view', 'home.dashboard');

//Modal
Route::get('/modal', [ModalController::class, 'modals'])->name('modal');

// Login routes
Route::post('/', [AuthController::class, 'customerLogin'])->name('login.submit');


