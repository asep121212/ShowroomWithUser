<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $discounts = Discount::all();
        return view('dashboard.discounts.index', compact('discounts'));
    }

    public function create()
    {
        return view('dashboard.discounts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'discount_name' => 'required',
            'discount' => 'required',
        ]);

        Discount::create([
            'discount_name' => $request->discount_name,
            'discount' => $request->discount,
        ]);

        // dd($add_discount);

        return redirect()->route('discounts.index')->with('success', 'Data berhasil disimpan');
    }

    public function edit(Discount $discount)
    {
        return view('dashboard.discounts.edit', compact('discount'));
    }

    public function update(Request $request, Discount $discount)
    {
        $request->validate([
            'discount_name' => 'required',
            'discount' => 'required',
        ]);

        $discount->update([
            'discount_name' => $request->discount_name,
            'discount' => $request->discount,
        ]);

        return redirect()->route('discounts.index')->with('success', 'data berhasil diupdate!');
    }

    public function destroy(Discount $discount)
    {
        $discount->delete();

        return redirect()->route('discounts.index')->with('success', 'Data berhasil dihapus');
    }
}
