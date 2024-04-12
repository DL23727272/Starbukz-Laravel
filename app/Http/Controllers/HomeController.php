<?php

namespace App\Http\Controllers;
class HomeController extends Controller
{
    public function home()
    {
        $productsController = new ProductController();
        $output = $productsController->product('home');

        return view('home', compact('output'));
    }
}
