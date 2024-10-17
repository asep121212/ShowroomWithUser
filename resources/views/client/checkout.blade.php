@extends('client.layouts.applogin')

@section('title', ' - Checkout')

@section('content')
<section>
    <div class="container my-5 py-5">
        <h4 class="text-light">Lakukan pembayaran pada barangmu - {{ Auth::user()->name }}</h4>
        <div class="row mt-5 align-items-start mb-5">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="col-md-6">
                @if($sales->isEmpty())
                <div class="alert alert-warning">
                    Silakan pilih produk terlebih dahulu.
                </div>
                @else
                <ol class="list-group list-group-numbered">
                    @foreach ($sales as $sale)
                    <li class="list-group-item d-flex justify-content-between align-items-start bg-primary text-white">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">{{ $sale->product->product_name }} - {{ $sale->product->category->category_name }}</div>
                            Rp {{ number_format($sale->product->price, 0, ',', '.') }}
                        </div>
                        <form onsubmit="return confirm('Yakin ingin menghapus data?');" action="{{ route('client.sale.destroy', $sale->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-primary">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>
                    </li>
                    @endforeach
                </ol>
                <div class="d-flex rounded justify-content-between bg-primary text-white">
                    <div class="ms-2 me-auto">
                        <div class="ms-2 me-auto py-3">
                            <p>Total : <span>Rp {{ number_format($totalPrice, 0, ',', '.') }}</span></p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-md-6">
                @if(!$sales->isEmpty())
                <div class="card-body bg-primary rounded p-3">
                    <form id="checkoutForm" action="{{ route('client.checkout.sudahbayar') }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3 row">
                            <label for="payment_id" class="col-sm-5 col-form-label text-white">Metode Pembayaran</label>
                            <div class="col-sm-6">
                                <select class="form-select" aria-label="Default select example" name="payment_id" id="payment_id" required>
                                    <option value="" selected>Pilih Metode Pembayaran</option>
                                    @foreach ($payments as $payment)
                                    <option value="{{ $payment->id }}">{{ $payment->bank }} | {{ $payment->number }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                       
                        <div class="mb-3 row" id="imagePaymentOption">
                            <label for="image_payment" class="col-sm-5 col-form-label text-white">Bukti Pembayaran</label>
                            <div class="col-sm-6">
                                <input type="file" class="form-control" id="image_payment" name="image_payment">
                            </div>
                        </div>
                        <button type="button" onclick="showAddressModal()" class="btn btn-light">Konfirmasi</button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addressModalLabel">Konfirmasi Alamat Pengiriman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <p>Nama: {{ Auth::user()->name }}</p>
                <p>Apakah Anda yakin ingin melanjutkan proses pembayaran?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="confirmCheckout()">Lanjutkan</button>
            </div>
        </div>
    </div>
</div>

<script>
    function showAddressModal() {
        var paymentId = document.getElementById('payment_id').value;
        var imagePayment = document.getElementById('image_payment').files.length;

        if (!paymentId) {
            alert('Silakan pilih metode pembayaran terlebih dahulu.');
            return;
        }
        
        if (paymentId !== '1') { 
          
            if (!imagePayment) {
                alert('Silakan unggah bukti pembayaran.');
                return;
            }
        }

        var addressModal = new bootstrap.Modal(document.getElementById('addressModal'));
        addressModal.show();
    };

    function confirmCheckout() {
 

    var form = document.getElementById('checkoutForm');
    var addressInput = document.createElement('input');
    addressInput.type = 'hidden';
    form.appendChild(addressInput);
    
    // Sisipkan input alamat ke dalam form sebelum mengirim
    form.appendChild(addressInput);
    
    form.submit();
}

</script>
@endsection
