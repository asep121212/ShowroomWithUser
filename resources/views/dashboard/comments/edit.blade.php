@extends('dashboard.layouts.app')

@section('title', 'Dashboard - Edit Comment')

@section('content')
  <h1 class="h3 mb-4 text-gray-800">Edit Komentar</h1>

  <div class="row">
    <div class="col-lg-9">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Edit Form Komentar</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('comments.update', $comment->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3 row">
              <label for="comment" class="col-sm-4 col-form-label">Komentar</label>
              <div class="col-sm-8">
                <textarea class="form-control" id="comment" name="comment" rows="3" required>{{ old('comment', $comment->comment) }}</textarea>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Komentar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
