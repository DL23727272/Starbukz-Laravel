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

//Fetch Products
Route::get('/', [ProductController::class, 'product']);

//Modal
Route::get('/modal', [ModalController::class, 'modals'])->name('modal');
