<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function home()
    {
        // Fetch the products and generate the $output variable
        $productsController = new ProductController();
        $output = $productsController->product('home');

        // Return the home view with the $output variable
        return view('home', compact('output'));
    }
}
