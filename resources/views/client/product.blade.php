@extends('client.layouts.applogin')

@section('title', 'Soetta Motor - Produk')

@section('content')
@php
    $bestSellerProducts = \App\Models\Product::getBestSellerProducts();
@endphp

@if ($bestSellerProducts->count() > 0)
<div class="container my-5 py-5">
    <h4 class="text-light">Best Seller</h4>
    <div class="row mt-5 justify-content-center align-items-center">
        @foreach ($bestSellerProducts as $bestSellerProduct)
        <div class="col-md-4 mb-4">
            <div class="card bg-warning"> <!-- Sesuaikan dengan warna yang Anda inginkan -->
                <img src="{{ $bestSellerProduct->image !== 'null' ? asset('storage/products/' . $bestSellerProduct->image) : asset('client/img/' . $bestSellerProduct->id . '.jpg') }}" class="card-img-top img-fluid" alt="Produk">
                <div class="card-body">
                    <h5 class="card-title fw-bold text-success fs-6 text-light">{{ $bestSellerProduct->product_name }} - {{ optional($bestSellerProduct->category)->category_name }}</h5>
                    <p class="card-text card-desc">Rp {{ number_format($bestSellerProduct->price_discount, 0, ',', '.') }}</p>
                    <div class="d-flex gap-2">
                        <a class="btn btn-secondary" href="{{ route('client.product.show', $bestSellerProduct->id) }}">Lihat Produk</a>
                        <form action="{{ route('client.product.add_to_cart') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $bestSellerProduct->id }}">
                            <button type="submit" class="btn btn-secondary"><i class="bi bi-cart3"></i></button>
                        </form>
                        <form action="{{ route('client.product.add_to_cart_and_redirect', $bestSellerProduct->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-secondary">Beli</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif

<section>
    <div class="container my-5 py-5">
        <h4 class="text-light">Produk Kami</h4>
        <div class="row mt-5 justify-content-center align-items-center">
            @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card bg-primary">
                    <img src="{{ $product->image !== 'null' ? asset('storage/products/' . $product->image) : asset('client/img/' . $product->id . '.jpg') }}" class="card-img-top img-fluid" alt="Produk">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-success fs-6 text-light">{{ $product->product_name }} - {{ optional($product->category)->category_name }}</h5>
                        <p class="card-text card-desc">Rp {{ number_format($product->price_discount, 0, ',', '.') }}</p>
                        <div class="d-flex gap-2">
                          <a class="btn btn-secondary" href="{{ route('client.product.show', $product->id) }}">Lihat Produk</a>
                            <form action="{{ route('client.product.add_to_cart') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-secondary"><ke class="bi bi-cart3"></i></button>
                            </form>
                            <form action="{{ route('client.product.add_to_cart_and_redirect', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-secondary">Beli</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
