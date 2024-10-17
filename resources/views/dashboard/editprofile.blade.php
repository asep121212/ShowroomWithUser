@extends('dashboard.layouts.app')

@section('title', 'Dashboard - Edit Profile')

@section('content')
  <h1 class="h3 mb-4 text-gray-800">Ayo update nama perusahaanmu</h1>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Form update profile</h6>
    </div>
    <div class="card-body">
      <form action="{{ route('profiles.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="mb-3 row">
          <label for="company_name" class="col-sm-4 col-form-label">Nama Perusahaan</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="company_name" name="company_name"
              value="{{ old('company_name', $profile->company_name) }}" required>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="address" class="col-sm-4 col-form-label">Alamat</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="address" name="address"
              value="{{ old('address', $profile->address) }}" required>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="number" class="col-sm-4 col-form-label">Nomor Hp</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="number" name="number"
              value="{{ old('number', $profile->number) }}" required>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="email" class="col-sm-4 col-form-label">Email</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="email" name="email"
              value="{{ old('email', $profile->email) }}" required>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="stoc" class="col-sm-4 col-form-label">Foto</label>
          <div class="col-sm-6">
            <input type="file" class="form-control" id="image" name="image" required>
            <img id="preview-image" src="#" alt="Preview Gambar"
              style="display: none; max-width: 50%; margin-top: 10px;">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Update profile</button>
      </form>
    </div>
  </div>
@endsection
