@extends('client.layouts.applogin')

@section('title', 'Pesanan Saya - Soetta Motor')

@section('content')
<div class="container my-5 py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-dark text-light">
                    <h4 class="mb-0">Pesanan Saya</h4>
                </div>
                <div class="card-body bg-secondary text-white">
                    @if ($pesananSaya->isEmpty())
                        <div class="alert alert-info text-center">
                            Anda belum melakukan pembayaran untuk pesanan apapun.
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped table-dark table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Tanggal Pembelian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pesananSaya as $index => $pesanan)
                                        <tr>
                                            <th scope="row">{{ $index + 1 }}</th>
                                            <td>{{ $pesanan->product->product_name }}</td>
                                            <td>Rp {{ number_format($pesanan->product->price, 0, ',', '.') }}</td>
                                            <td>
                                                @if($pesanan->status == 'pending')
                                                    <span class="badge badge-warning">Pending</span>
                                                @elseif($pesanan->status == 'paid')
                                                    <span class="badge badge-success">Paid</span>
                                                @else
                                                    <span class="badge badge-danger">{{ ucfirst($pesanan->status) }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $pesanan->created_at->format('d-m-Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
