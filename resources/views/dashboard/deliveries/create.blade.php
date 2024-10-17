@extends('dashboard.layouts.app')

@section('title', 'Dashboard - Tambah Metode Pengiriman')

@section('content')
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambahkan data Metode Pengiriman</h1>

    <div class="row">
      <div class="col-lg-6">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form tambah Metode Pengiriman</h6>
          </div>
          <div class="card-body">
            <form action="{{ route('deliveries.store') }}" method="POST">
              @csrf
              <div class="mb-3 row">
                <label for="delivery_name" class="col-sm-4 col-form-label">Nama Pengiriman</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="delivery_name" name="delivery_name" required>
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
