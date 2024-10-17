@extends('dashboard.layouts.app')

@section('title', 'Dashboard - Data Metode Pembayaran')

@push('css')
  <link href="{{ asset('/') }}dash/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')
  <h1 class="h3 mb-4 text-gray-800">Metode Pembayaran</h1>
  <a class="btn btn-primary mb-3" href="{{ route('payments.create') }}">Tambahkan Metode Pembayaran</a>

  @if (session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <div class="card shad ow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tabel Metode Pembayaran</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Bank</th>
              <th>Nomor Bank</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Nama Bank</th>
              <th>Nomor Bank</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            @forelse ($payments as $payment)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $payment->bank }}</td>
                <td>{{ $payment->number }}</td>
                <td>
                  <form onsubmit="return confirm('Yakin ingin menghapus data?');"
                    action="{{ route('payments.destroy', $payment->id) }}" method="POST">
                    <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-sm btn-warning"><i
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
