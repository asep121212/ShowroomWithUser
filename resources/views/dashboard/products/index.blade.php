@extends('dashboard.layouts.app')

@section('title', 'Dashboard - Date Produk')

@push('css')
  <link href="{{ asset('/') }}dash/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')
  <h1 class="h3 mb-4 text-gray-800">Kategori Produk</h1>
  <a class="btn btn-primary mb-3" href="{{ route('products.create') }}">Tambahkan Produk</a>

  @if (session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <div class="card shad ow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tabel Produk</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Produk</th>
              <th>Kategori</th>
              <th>Diskon</th>
              <th>Harga</th>
              <th>Best Seller</th>
              <th>Harga Akhir</th>
              <th>Deskripsi</th>
              <th>Foto</th>
              <th>Aksi</th>
            </tr>
          </thead>

          <tbody>
            @forelse ($products as $product)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ optional($product->category)->category_name }}</td>
                <td>{{ number_format(optional($product->discount)->discount, 0, ',', '.') }}%</td>
                <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                <td>{{ $product->best_seller ? 'Ya' : 'Tidak' }}</td>
                <td>Rp {{ number_format($product->price_discount, 0, ',', '.') }}</td>
                <td>{{ $product->product_information }}</td>
                <td>
                  <img
                    src="{{ $product->image !== 'null' ? asset('storage/products/' . $product->image) : asset('client/img/' . $product->id . '.jpg') }}"
                    alt="" class="img-table">
                </td>
                <td>
                  <form onsubmit="return confirm('Yakin ingin menghapus data?');"
                    action="{{ route('products.destroy', $product->id) }}" method="POST">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning"><i
                        class="fa fa-pencil-alt"></i></a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                  </form>
                </td>
              </tr>
            @empty
              <div class="alert alert-danger">
                Data kosong.
              </div>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection


@push('js')
  <!-- Page level plugins -->
  <script src="{{ asset('/') }}dash/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ asset('/') }}dash/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('/') }}dash/js/demo/datatables-demo.js"></script>
@endpush
