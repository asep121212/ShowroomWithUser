@extends('dashboard.layouts.app')

@section('title', 'Dashboard - Tambah Kategori')

@push('css')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@endpush

@section('content')
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambahkan data produkmu</h1>

    <div class="row">
      <div class="col-lg-9">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form tambah produk</h6>
          </div>
          <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3 row">
                <label for="product_name" class="col-sm-4 col-form-label">Nama Produk</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="product_name" name="product_name" required>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="category_id" class="col-sm-4 col-form-label">Nama Kategori</label>
                <div class="col-sm-6">
                  <select class="form-select" aria-label="Default select example" name="category_id" required>
                    <option selected>Pilih Kategori</option>
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="discount_id" class="col-sm-4 col-form-label">Nama Diskon</label>
                <div class="col-sm-6">
                  <select class="form-select" aria-label="Default select example" name="discount_id">
                    <option value="" selected>Pilih Diskon</option>
                    @foreach ($discounts as $discount)
                      <option value="{{ $discount->id }}">{{ $discount->discount_name }} -
                        {{ number_format($discount->discount, 0, ',', '.') }}%
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="price" class="col-sm-4 col-form-label">Harga</label>
                <div class="col-sm-6">
                  <input type="number" class="form-control" id="price" name="price" required>
                </div>
              </div>
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="best_seller" name="best_seller">
                <label class="form-check-label" for="best_seller">Best Seller</label>
              </div>
              
              <div class="mb-3 row">
                <label for="stoc" class="col-sm-4 col-form-label">Keterangan</label>
                <div class="form-floating col-sm-6">
                  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"
                    name="product_information" required></textarea>
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
              <button type="submit" class="btn btn-primary">Tambah kategori</button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection

@push('js')
  <script>
    document.getElementById('image').onchange = function(evt) {
      var reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById('preview-image').src = e.target.result;
        document.getElementById('preview-image').style.display = 'block';
      };
      reader.readAsDataURL(this.files[0]);
    };
  </script>
@endpush
