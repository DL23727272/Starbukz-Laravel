<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home($customerID = null)
    {
        $productsController = new ProductController();
        $output = $productsController->product('home');

        //retrieve customerID from session
        $sessionCustomerID = session()->get('customerID');

        // Pass data to the view
        return view('home', compact('output', 'customerID'));
    }
}
