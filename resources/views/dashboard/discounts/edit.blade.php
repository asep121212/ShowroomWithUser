@extends('dashboard.layouts.app')

@section('title', 'Dashboard - Edit Discount')

@section('content')
  <h1 class="h3 mb-4 text-gray-800">Update discountmu</h1>

  <div class="row">
    <div class="col-lg-6">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Form update discount</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('discounts.update', $discount->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3 row">
              <label for="discount_name" class="col-sm-4 col-form-label">Nama discount</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="discount_name" name="discount_name"
                  value="{{ old('discount_name', $discount->discount_name) }}" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="discount" class="col-sm-4 col-form-label">Nama discount</label>
              <div class="col-sm-8">
                <input type="number" class="form-control" id="discount" name="discount"
                  value="{{ old('discount', $discount->discount) }}" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Update discount</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
