@extends('client.layouts.applogin')

@section('title', 'Soetta Motor - Keranjang')

@section('content')
<section>
    <div class="container my-5 py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-dark text-light shadow-lg">
                    <div class="card-header bg-primary text-light">
                        <h4 class="mb-0">Keranjang Saya - {{ Auth::user()->name }}</h4>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-dark table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" style="text-align: justify">Gambar</th>
                                        <th scope="col" style="text-align: justify">Nama Produk</th>
                                        <th scope="col" style="text-align: justify">Harga</th>
                                        <th scope="col" class="quantity-column" style="text-align: justify">Quantity</th>
                                        <th scope="col" style="text-align: justify">Total Harga</th>
                                        <th scope="col" style="text-align: justify"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $cart)
                                    <tr>
                                        <td>
                                            <img src="{{ $cart->product->image !== 'null' ? asset('storage/products/' . optional($cart->product)->image) : asset('client/img/' . $cart->product->id) . '.jpg' }}"
                                                alt="{{ optional($cart->product)->product_name }}" class="img-cart rounded shadow-sm">
                                        </td>
                                        <td>
                                            {{ optional($cart->product)->product_name }} -
                                            {{ optional($cart->product->category)->category_name }}
                                        </td>
                                        <td>Rp {{ number_format(optional($cart->product)->price, 0, ',', '.') }}
                                        </td>
                                        <td class="quantity-column">{{ $cart->quantity }}</td>
                                        <td>Rp {{ number_format($cart->total, 0, ',', '.') }}</td>
                                        <td>
                                            <form
                                                onsubmit="return confirm('Yakin ingin menghapus data?');"
                                                action="{{ route('client.product.destroy', $cart->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-sm btn-danger"><i
                                                        class="bi bi-x-lg"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="text-center mt-4">
                            @if ($carts->isNotEmpty())
                            <form action="{{ route('client.checkout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Checkout</button>
                            </form>
                            @else
                            <p class="text-white-50">Keranjang Anda kosong. Tambahkan produk untuk melanjutkan.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<style>
    .quantity-column {
        width: 150px; /* Sesuaikan lebar kolom sesuai kebutuhan */
    }

    .img-cart {
        max-width: 100px;
        height: auto;
        border-radius: 10px; /* Membuat sudut gambar lebih halus */
    }

    .table-hover tbody tr:hover {
        background-color: rgba(255, 255, 255, 0.1); /* Hover effect untuk membuat tabel lebih menarik */
    }
</style>
