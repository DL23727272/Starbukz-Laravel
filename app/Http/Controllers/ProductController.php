<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function product($view)
    {
        $products = DB::table('product_table')->get();
        $productCount = 0;
        $output = '';

        $output .= '<div class="row justify-content-center m-2">';

        foreach ($products as $row) {
            $output .= '<div class="card mt-4 m-3 p-3 col-12 col-md-6 col-lg-3">';
            $output .= '<div class="d-flex justify-content-center">';
            $output .= '<img src="' . asset('assets/products/' . $row->productImage) . '" alt="Frontrow"
                         style="max-width: 100%; height: 200px; object-fit: cover; filter: drop-shadow(0px 5px 4px #006341)"/>';
            $output .= '</div>';
            $output .= '<hr class="border-success border-2"/>';
            $output .= '<div>';
            $output .= '<h4 class="card-title" id="name' . $row->productID . '">' . $row->productName . '</h4>';
            $output .= '<p class="card-text text-secondary" id="productDesc">' . $row->productDesc . '</p>';
            $output .= '<p class="card-text text-secondary" id="productPrice"><i class="fa-solid fa-peso-sign"></i> ' . $row->productPrice . '</p>';

            // Check if view is not index para ma include yung select button
            if ($view !== 'index') {
                $output .= '<button class="btn text-white addtocart"
                            onmouseover="this.style.backgroundColor=\'#004f2d\'"
                            onmouseout="this.style.backgroundColor=\'#006341\'"
                            style="background-color: #006341;"
                            data-bs-toggle="modal" data-bs-target="#modalProduct"
                            data-product-id="' . $row->productID . '"
                            data-product-name="' . $row->productName . '"
                            data-product-image="' . $row->productImage . '"
                            data-product-price="' . $row->productPrice . '"
                            data-product-detail="' . $row->productDesc . '">
                            Select
                        </button>';
            } else {
                $output .= '<p>
                <a href = "#"
                style ="text-decoration: none; color: black;"
                onmouseover="this.style.textDecoration=\'underline\'"
                onmouseout="this.style.textDecoration=\'none\'">

                Login
                </a>
                 /
                <a data-bs-toggle="modal" data-bs-target="#exampleModal"
                    style=" color: black; text-decoration: none; cursor: pointer;"
                    onmouseover="this.style.textDecoration=\'underline\'"
                    onmouseout="this.style.textDecoration=\'none\'">

                  Sign up
                 </a>

                 to order</p>';

            }
            $output .= '</div>';
            $output .= '</div>';

            $productCount++;

            if ($productCount % 3 == 0 && $productCount < count($products)) {
                $output .= '</div>';
                $output .= '<div class="row justify-content-center m-2">'; // Start new row
            }
        }

       
        $output .= '</div>';

        // condition para sa view pag hindi index mag papakita yung may button if wala yung else condition naman
        if ($view !== 'index') {
            return view('home', compact('output'));
        } else {
            return view('index', compact('output'));
        }
    }

}
