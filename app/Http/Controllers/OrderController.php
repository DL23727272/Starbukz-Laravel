<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $customerID = $request->session()->get('customerID');
        $cartItems = json_decode($request->session()->get('cartItems'), true) ?? [];

        if ($customerID && count($cartItems) > 0) {

            DB::beginTransaction();

            try {
                $order = DB::table('order_table')->insertGetId([
                    'customerID' => $customerID,
                    'totalPrice' => $this->calculateTotalPrice($cartItems),
                    'status' => 'Pending',
                    'orderDate' => now(),

                ]);

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

                DB::commit();

                $request->session()->forget('cartItems');

                return response()->json([
                    'status' => 'success',
                    'message' => 'Order placed successfully!',
                    'orderID' => $order
                ]);
            } catch (\Exception $e) {
                DB::rollBack();

                return response()->json([
                    'status' => 'error',
                    'message' => 'Failed to place order. Please try again later.'
                ]);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Please Login or Cart is empty!'
            ]);
        }
    }

    private function calculateTotalPrice($cartItems)
    {
        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $totalPrice += $item['total'];
        }
        return $totalPrice;
    }


}
