@extends('dashboard.layouts.app')

@section('title', 'Dashboard - Tambah Metode Pembayaran')

@section('content')
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambahkan data Metode Pembayaran</h1>

    <div class="row">
      <div class="col-lg-6">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form tambah Metode Pembayaran</h6>
          </div>
          <div class="card-body">
            <form action="{{ route('payments.store') }}" method="POST">
              @csrf
              <div class="mb-3 row">
                <label for="bank" class="col-sm-4 col-form-label">Nama Bank</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="bank" name="bank" required>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="number" class="col-sm-4 col-form-label">Nomor Rekening</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="number" name="number" required>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
