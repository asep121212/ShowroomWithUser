<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Profile;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $profile = Profile::take(1)->get();
        return view('client.landingpage', compact('products', 'profile'));
    }
    public function product()
    {
        $profile = Profile::take(1)->get();
        return view('client.product', compact('profile'));
    }
    public function about()
    {
        $profile = Profile::take(1)->get();
        return view('client.about', compact( 'profile'));
    }
}
