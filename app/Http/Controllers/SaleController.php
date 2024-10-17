<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Sale;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        $mounths = [
            ['value' => 1, 'label' => 'Januari'],
            ['value' => 2, 'label' => 'Februari'],
            ['value' => 3, 'label' => 'Maret'],
            ['value' => 4, 'label' => 'April'],
            ['value' => 5, 'label' => 'Mei'],
            ['value' => 6, 'label' => 'Juni'],
            ['value' => 7, 'label' => 'Juli'],
            ['value' => 8, 'label' => 'Agustus'],
            ['value' => 9, 'label' => 'September'],
            ['value' => 10, 'label' => 'Oktober'],
            ['value' => 11, 'label' => 'November'],
            ['value' => 12, 'label' => 'Desember'],
        ];
    
        $years = range(date('Y'), 2021); // Range tahun dari tahun sekarang hingga 2010
    
        $statuses = ['Pending', 'Sudah Bayar', 'Selesai'];
    
        $sales = Sale::query();
    
        if ($request->filled('bulan') && $request->filled('tahun')) {
            $sales->whereMonth('updated_at', $request->bulan)
                  ->whereYear('updated_at', $request->tahun);
        }
    
        if ($request->filled('status')) {
            $sales->where('status', $request->status);
        }
    
        $sales = $sales->with(['user', 'product'])->get();
    
        return view('dashboard.sales.index', compact('sales', 'mounths', 'years', 'statuses', 'request'));  
    }

    public function store(Request $request, $product)
    {
        // Ambil data keranjang yang sesuai dengan user yang sedang login
        $cart = Cart::where('user_id', auth()->user()->id)
                    ->where('product_id', $product)
                    ->first();

        // Validasi jika data keranjang tidak ditemukan atau sudah tidak ada
        if (!$cart) {
            return redirect()->back()->with('error', 'Keranjang tidak ditemukan');
        }

        // Simpan data penjualan (checkout) ke dalam tabel sales
        Sale::create([
            'user_id' => auth()->user()->id,
            'product_id' => $product,
            'status' => 'pending', // Atur status menjadi pending
        ]);

        // Hapus data keranjang setelah checkout
        $cart->delete();

        return redirect()->route('client.product.cart')->with('success', 'Checkout berhasil');
    }

    public function edit(Sale $sale)
    {
        $status = [
            ['name' => "Pending"],
            ['name' => "Sudah Bayar"],
            ['name' => "Selesai"]
        ];

        // dd($status);
        return view('dashboard.sales.edit', compact('sale','status'));
    }

    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $sale->update([
            'status' => $request->status,
        ]);

        // dd($update);

        return redirect()->route('sales.index')->with('success', 'Berhasil update');
    }

    public function exportPDF(Request $request)
    {
        $mounths = [
            ['value' => 1, 'label' => 'Januari'],
            ['value' => 2, 'label' => 'Februari'],
            ['value' => 3, 'label' => 'Maret'],
            ['value' => 4, 'label' => 'April'],
            ['value' => 5, 'label' => 'Mei'],
            ['value' => 6, 'label' => 'Juni'],
            ['value' => 7, 'label' => 'Juli'],
            ['value' => 8, 'label' => 'Agustus'],
            ['value' => 9, 'label' => 'September'],
            ['value' => 10, 'label' => 'Oktober'],
            ['value' => 11, 'label' => 'November'],
            ['value' => 12, 'label' => 'Desember'],
        ];
    
        $years = range(date('Y'), 2021); // Range tahun dari tahun sekarang hingga 2010
    
        $statuses = ['Pending', 'Sudah Bayar', 'Selesai'];
    
        $sales = Sale::query();
    
        if ($request->filled('bulan') && $request->filled('tahun')) {
            $sales->whereMonth('updated_at', $request->bulan)
                  ->whereYear('updated_at', $request->tahun);
        }
    
        if ($request->filled('status')) {
            $sales->where('status', $request->status);
        }
    
        $sales = $sales->with(['user', 'product'])->get();

        // Generate PDF
        $pdf = PDF::loadView('dashboard.sales.export_pdf', compact('sales'));

        // Download PDF
        return $pdf->download('sales_report.pdf');
    }

}
