@extends('client.layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="container" style="padding-bottom: 5%;padding-top:5%">
    <div class="card">
        <div class="card-header" style="background-color: #b6895b ; color: white;">
            <h1 class="h3 mb-0">Edit Profile</h1>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('clientProfile.update') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                </div>
                <div class="mb-3">
                    <label for="phone_number" class="form-label">No Handphone</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}">
                </div>
                <div class="mb-3">
                    <label for="addresses" class="form-label">Alamat</label>
                    <div id="address-fields">
                        @foreach ($addresses as $index => $address)
                            <div class="card mb-2">
                                <div class="card-body">
                                    <input type="text" class="form-control mb-2" name="addresses[]" value="{{ old('addresses.' . $index, $address->address) }}">
                                </div>
                            </div>
                        @endforeach
                        <div class="card mb-2">
                            <div class="card-body">
                                <input type="text" class="form-control mb-2" name="addresses[]" placeholder="Tambah alamat baru">
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary mt-2" onclick="addAddressField()">Tambah Alamat</button>
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
</div>

<script>
    function addAddressField() {
        const container = document.getElementById('address-fields');
        const card = document.createElement('div');
        card.className = 'card mb-2';
        const cardBody = document.createElement('div');
        cardBody.className = 'card-body';
        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'addresses[]';
        input.className = 'form-control mb-2';
        cardBody.appendChild(input);
        card.appendChild(cardBody);
        container.appendChild(card);
    }
</script>
@endsection
