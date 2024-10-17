@extends('dashboard.layouts.app')

@section('title', 'Dashboard - Edit Narahubung')

@push('css')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@endpush

@section('content')
  <h1 class="h3 mb-4 text-gray-800">Edit Narahubung</h1>

  <div class="row">
    <div class="col-lg-6">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Form Edit Narahubung</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3 row">
              <label for="name" class="col-sm-4 col-form-label">Nama name</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="name" name="name"
                  value="{{ old('name', $contact->name) }}" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="number" class="col-sm-4 col-form-label">Nomor Rekening</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="number" name="number"
                  value="{{ old('number', $contact->number) }}" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Update status</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
