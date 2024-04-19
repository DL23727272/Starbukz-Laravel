<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    // Function to place an order
    public function placeOrder(Request $request)
    {
        $customerID = $request->session()->get('customerID');
        $cartItems = json_decode($request->session()->get('cartItems'), true) ?? [];

        if ($customerID && count($cartItems) > 0) {
            // Start a database transaction
            DB::beginTransaction();

            try {
                // Create a new order
                $order = DB::table('order_table')->insertGetId([
                    'customerID' => $customerID,
                    'totalPrice' => $this->calculateTotalPrice($cartItems),
                    'status' => 'Pending',
                    'orderDate' => now(),

                ]);

                // Save order items
                $orderItems = [];
                foreach ($cartItems as $item) {
                    $orderItems[] = [
                        'orderID' => $order,
                        'productID' => $item['productId'],
                        'quantity' => $item['quantity'],
                        'pricePerItem' => $item['productPrice'],
                        'subtotal' => $item['total'],
                    ];
                }
                DB::table('order_items_table')->insert($orderItems);

                // Commit the transaction
                DB::commit();

                // Clear the cart after placing the order
                $request->session()->forget('cartItems');

                // Order placed successfully
                return response()->json([
                    'status' => 'success',
                    'message' => 'Order placed successfully!',
                    'orderID' => $order
                ]);
            } catch (\Exception $e) {
                // Something went wrong, rollback the transaction
                DB::rollBack();

                // Failed to place the order
                return response()->json([
                    'status' => 'error',
                    'message' => 'Failed to place order. Please try again later.'
                ]);
            }
        } else {
            // Show an error message if customerID is missing or cart is empty
            return response()->json([
                'status' => 'error',
                'message' => 'Please Login or Cart is empty!'
            ]);
        }
    }

    // Function to calculate total price of items in the cart
    private function calculateTotalPrice($cartItems)
    {
        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $totalPrice += $item['total'];
        }
        return $totalPrice;
    }


}
