@extends('dashboard.layouts.app')

@section('title', 'Dashboard - Profile')

@push('css')
  <link href="{{ asset('/') }}dash/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')
  <h1 class="h3 mb-4 text-gray-800">Konfigurasi CRM Perusahaan</h1>

  @if (session('success'))
    <div class="alert alert-success col-lg-4">
      {{ session('success') }}
    </div>
  @endif

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Profile Perusahaan</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Perusahaan</th>
              <th>Alamat</th>
              <th>Nomor Hp</th>
              <th>Email</th>
              <th>Foto</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Nama Perusahaan</th>
              <th>Alamat</th>
              <th>Nomor Hp</th>
              <th>Email</th>
              <th>Foto</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            @forelse ($profiles as $profile)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $profile->company_name }}</td>
                <td>{{ $profile->address }}</td>
                <td>{{ $profile->number }}</td>
                <td>{{ $profile->email }}</td>
                <td>
                  <img
                    src="{{ $profile->image !== 'null' ? asset('storage/profiles/' . $profile->image) : asset('client/img/' . 'logo.jpg') }}"
                    alt="" class="img-table">
                </td>
                <td>
                  <form onsubmit="return confirm('Are you sure you want to delete??');" action="" method="POST">
                    <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-sm btn-warning"><i
                        class="fa fa-pencil-alt"></i></a>
                    @csrf
                  </form>
                  {{-- <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-sm btn-warning"><i
                      class="fa fa-pencil-alt"></i></a> --}}
                </td>
              </tr>
            @empty
              <div class="alert alert-danger">
                Data empty.
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
