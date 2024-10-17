<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Profile;
use Illuminate\Http\Request;

class ClientProductController extends Controller
{
    public function index()
    {
        $profile = Profile::take(1)->get();
        $products = Product::with('category')->get();
        return view('client.product', compact('products','profile'));
    }

    public function show(Product $product)
    {
        return view('client.detailproduct', compact('product'));
    }
}
