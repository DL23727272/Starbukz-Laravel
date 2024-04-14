<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
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
                $customerID = $this->getCustomerID($request->input('customerName'));
                session()->put('customerID', $customerID);
                // Pass the customer ID to the HomeController
                return (new HomeController())->home($customerID);
            }

            return redirect()->back()->withInput()->withErrors(['error' => 'Invalid credentials']);
        }


        protected function getCustomerID($customerName) {
            $user = DB::table('customer_table')->where('customerName', $customerName)->first();
            return $user ? $user->customerID : null;
        }

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
