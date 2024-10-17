<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Profile;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
{
    $totalDiscountSales = DB::table('sales')
        ->join('products', 'sales.product_id', '=', 'products.id')
        ->where('sales.status', 'Selesai')
        ->sum('products.price_discount');

    $bestSellingProduct = DB::table('sales')
        ->select('products.product_name', 'categories.category_name', DB::raw('COUNT(sales.product_id) as total_sales'))
        ->join('products', 'sales.product_id', '=', 'products.id')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->groupBy('sales.product_id', 'products.product_name', 'categories.category_name')
        ->orderBy('total_sales', 'DESC')
        ->first();

    // Fetch profile data
    $profile = DB::table('profiles')->first();

    return view('dashboard.index', compact('totalDiscountSales', 'bestSellingProduct', 'profile'));
}
}
