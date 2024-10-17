<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
    public function index()
    {
        $products = Product::with(['category', 'discount'])->get();
        return view('dashboard.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $discounts = Discount::all();
        return view('dashboard.products.create', compact('categories', 'discounts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'product_information' => 'required',
            'best_seller' => 'boolean',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|',
        ]);

        $discountData = null;
        if ($request->discount_id) {
            $discountData = Discount::find($request->discount_id);
        }
        $discount = $discountData ? $discountData->discount : 0;

        $priceDiscount = ($discount / 100) * $request->price;
        $priceEnd = $request->price - $priceDiscount;

        $imagePath = $request->file('image')->store('public/products');
        $imageName = basename($imagePath);

        Product::create([
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'discount_id' => $request->discount_id,
            'price' => $request->price,
            'price_discount' => $priceEnd, 
            'product_information' => $request->product_information,
            'image' => $imageName,
        ]);

        return redirect()->route('products.index')->with('success', 'Data berhasil disimpan');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $discounts = Discount::all();
        return view('dashboard.products.edit', compact('product', 'categories', 'discounts'));
    }

    public function update(Request $request, Product $product)
{
    $request->validate([
        'product_name' => 'required',
        'category_id' => 'required',
        'price' => 'required',
        'product_information' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|nullable', // tambahkan nullable agar gambar tidak wajib diisi
    ]);

    $discountData = null;
    if ($request->discount_id) {
        $discountData = Discount::find($request->discount_id);
    }
    $discount = $discountData ? $discountData->discount : 0;

    $priceDiscount = ($discount / 100) * $request->price;
    $priceEnd = $request->price - $priceDiscount;

    $imageName = $product->image; // Default to the existing image name
    if ($request->hasFile('image')) {
        // Jika gambar baru diunggah, simpan gambar baru
        Storage::delete('public/products/' . $product->image);
        $imagePath = $request->file('image')->store('public/products');
        $imageName = basename($imagePath);
    }

    $product->update([
        'product_name' => $request->product_name,
        'category_id' => $request->category_id,
        'discount_id' => $request->discount_id,
        'price' => $request->price,
        'price_discount' => $priceEnd, 
        'product_information' => $request->product_information,
        'image' => $imageName,
        'best_seller' => $request->has('best_seller'), // Jika checkbox dicentang, best_seller diset true, jika tidak dicentang, diset false
    ]);

    return redirect()->route('products.index')->with('success', 'Data berhasil update');
}

    

    public function destroy(Product $product)
    {
        Storage::delete('public/products/' . $product->image);

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus');
    }
}
