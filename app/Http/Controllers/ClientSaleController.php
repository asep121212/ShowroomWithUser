<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Comment;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientSaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cart()
    {
        $userId = Auth::id();
        $carts = Cart::with('product')->where('user_id', $userId)->get();
        return view('client.cart', compact('carts'));
    }

    public function pesananSaya()
{
    $userId = Auth::id();
    $pesananSaya = Sale::with('product')->where('user_id', $userId)->get();

    return view('client.pesanan-saya', compact('pesananSaya'));
}


    public function showProduct($productId)
    {
        $product = Product::with('comments.user', 'category')->findOrFail($productId);
        return view('client.detailproduct', compact('product'));
    }

    public function addComment(Request $request, $productId)
    {
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'product_id' => $productId,
            'comment' => $request->comment,
        ]);

        return redirect()->route('client.product.show', $productId)->with('success', 'Komentar berhasil ditambahkan.');
    }
    public function addToCart(Request $request)
{
    $userId = Auth::id();
    $product = Product::findOrFail($request->product_id);

    // Calculate total based on product price and quantity
    $total = $product->price_discount * 1; // Default quantity is 1

    // Save data to the cart
    $cartItem = new Cart([
        'user_id' => $userId,
        'product_id' => $request->product_id,
        'quantity' => 1, // Default quantity
        'total' => $total,
    ]);
    $cartItem->save();

    // Redirect back to the product page with a success message
    return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang.');
}

public function addToCartAndRedirect(Request $request, $productId)
{
    $userId = Auth::id();
    $product = Product::findOrFail($productId);

    // Calculate total based on product price and quantity
    $total = $product->price_discount * 1; // Default quantity is 1

    // Save data to the cart
    $cartItem = new Cart([
        'user_id' => $userId,
        'product_id' => $productId,
        'quantity' => 1, // Default quantity
        'total' => $total,
    ]);
    $cartItem->save();

    // Redirect to the cart page with a success message
    return redirect()->route('client.product.cart')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
}

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('client.product.cart')->with('success', 'Produk berhasil dikurangi dari keranjang.');
    }

    public function checkout(Request $request)
{
    $userId = Auth::id();
    $carts = Cart::where('user_id', $userId)->get();

    foreach ($carts as $cart) {
        Sale::create([
            'user_id' => $userId,
            'product_id' => $cart->product_id,
            'payment_id' => null,
            'status' => 'Pending',
            'image' => null,
        ]);
    }

    Cart::where('user_id', $userId)->delete();

    return redirect()->route('client.checkout.pembayaran')->with('success', 'Checkout berhasil.');
}


    public function pembayaran(Request $request)
    {
        $userId = Auth::id();
        $sales = Sale::with('product.category')
                    ->where('user_id', $userId)
                    ->where('status', 'Pending')
                    ->get();
    
        $totalPrice = $sales->sum(function ($sale) {
            return $sale->product->price;
        });
    
        $payments = Payment::all();
        
        // Fetch the user's addresses
        $addresses = Auth::user()->addresses;
    
      
        return view('client.checkout', compact('sales', 'totalPrice', 'payments'));
    }
    



    // update pembayaran
    public function updateSales(Request $request)
{
    $sales = Sale::where('user_id', Auth::id())->where('status', 'Pending')->get();
    
    $request->validate([
        'payment_id' => 'required|exists:payments,id',
        'image_payment' => $request->payment_id != '1' ? 'required|image|mimes:jpeg,png,jpg,gif|max:2048' : 'nullable',
    ]);
    
    $imageName = null;
    if ($request->hasFile('image_payment') && $request->payment_id != '2') {
        $imagePath = $request->file('image_payment')->store('public/payment');
        $imageName = basename($imagePath);
    }
    
    foreach ($sales as $sale) {
        $sale->update([
            'payment_id' => $request->payment_id,
            'status' => $request->payment_id == '2' ? 'COD' : 'Sudah Bayar',
            'image' => $request->payment_id != '2' ? ($imageName ?? $sale->image) : null,
        ]);
    }
    
    return redirect()->route('client.product.index')->with('success', 'Berhasil bayar.');
}

    


    // Hapus produk di pembayaran
    public function hapus(Sale $sale)
    {
        $sale->delete();
        return redirect()->route('client.checkout.pembayaran')->with('success', 'Produk berhasil dikurangi.');
    }
}
