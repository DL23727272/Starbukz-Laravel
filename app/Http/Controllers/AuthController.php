<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function customerLogin(Request $request)
    {
        $request->validate([
            'customerName' => 'required|string',
            'customerPassword' => 'required|string',
        ]);

        if ($this->authenticate($request->input('customerName'), $request->input('customerPassword'))) {
            return Redirect::to('/home');
        }

        return redirect()->back()->withInput()->withErrors(['error' => 'Invalid credentials']);
    }

    // Other methods


    protected function authenticate($username, $password) {

        $user = DB::table('customer_table')->where('customerName', $username)->first();

        // Check if user exists and password is correct
        if ($user && ($this->isMd5Equal($password, $user->customerPassword))) {
            return true; // Authentication successful
        }

        return false; // Authentication failed
    }

    protected function isMd5Equal($password, $hashedPassword) {

        return md5($password) === $hashedPassword;
    }



}
