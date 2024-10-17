@extends('dashboard.layouts.app')

@section('title', 'Dashboard - Tambah Diskon')

@section('content')
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambahkan data diskonmu</h1>

    <div class="row">
      <div class="col-lg-6">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form tambah diskon</h6>
          </div>
          <div class="card-body">
            <form action="{{ route('discounts.store') }}" method="POST">
              @csrf
              <div class="mb-3 row">
                <label for="discount_name" class="col-sm-4 col-form-label">Nama dickon</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="discount_name" name="discount_name" required>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="discount" class="col-sm-4 col-form-label">Besaran dickon</label>
                <div class="col-sm-3 d-flex">
                  <input type="number" class="form-control" id="discount" name="discount" required>
                  <label class="col-form-label">%</label>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Tambah dickon</button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
