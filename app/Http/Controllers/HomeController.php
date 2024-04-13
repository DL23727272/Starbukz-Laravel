<?php
namespace App\Http\Controllers;
use App\Http\Controllers\ProductController;

class HomeController extends Controller
{
    public function home($customerID = null)
    {
        $productsController = new ProductController();
        $output = $productsController->product('home');

        return view('home', compact('output', 'customerID'));
    }
}
