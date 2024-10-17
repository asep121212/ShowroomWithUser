@extends('client.layouts.applogin')

@section('title', 'Soetta Motor')

@section('content')
<div class="container mt-5">
    <h3 class="text-light mb-4">Tambah Komentar</h3>
    <form action="{{ route('client.comment.add_comment') }}" method="POST" class="bg-dark p-4 rounded shadow">
        @csrf
        <div class="form-group">
            <label for="comment" class="text-light">Komentar Anda</label>
            <textarea name="comment" id="comment" rows="4" class="form-control bg-secondary text-light border-light" placeholder="Tuliskan komentar Anda..."></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3 w-100">Kirim Komentar</button>
    </form>
</div>
@endsection
