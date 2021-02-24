<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::query()
            ->paginate(9);

        return view('home')
            ->withProducts($products);
    }

    public function product(Product $product)
    {
        return view('product')
            ->withProduct($product);
    }
}
