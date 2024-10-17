@extends('dashboard.layouts.app')

@section('title', 'Dashboard - Manage Comments')

@push('css')
  <link href="{{ asset('/') }}dash/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')
  <h1 class="h3 mb-4 text-gray-800">Kelola Komentar</h1>

  @if (session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tabel Komentar</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Produk</th>
              <th>User</th>
              <th>Komentar</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($comments as $comment)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $comment->product->product_name }}</td>
                <td>{{ $comment->user->name }}</td>
                <td>{{ $comment->comment }}</td>
                <td>
                  <form onsubmit="return confirm('Are you sure you want to delete this comment?');"
                    action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                    <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-sm btn-warning"><i
                        class="fa fa-pencil-alt"></i> Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="text-center">No comments available.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script src="{{ asset('/') }}dash/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ asset('/') }}dash/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="{{ asset('/') }}dash/js/demo/datatables-demo.js"></script>
@endpush
