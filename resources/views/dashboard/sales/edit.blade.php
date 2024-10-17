@extends('dashboard.layouts.app')

@section('title', 'Dashboard - Edit Status')

@push('css')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@endpush

@section('content')
  <h1 class="h3 mb-4 text-gray-800">Update Status Penjualan</h1>

  <div class="row">
    <div class="col-lg-6">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Form update penjualan</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('sales.update', $sale->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3 row">
              <label for="status" class="col-sm-4 col-form-label">Status penjualan</label>
              <div class="col-sm-6">
                <select class="form-select" aria-label="Default select example" name="status" required>
                  <option selected>Pilih Status Penjualan</option>
                  @foreach ($status as $item)
                    <option value="{{ $item['name'] }}">{{ $item['name'] }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Update status</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
