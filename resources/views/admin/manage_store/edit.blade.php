@extends('layouts.admin')

@section('title', 'Edit Store')

@section('content')
    <div class="mb-3">
        <h2>Edit Store</h2>
    </div>

    <form action="{{ route('stores.update', $store->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="logo" class="form-label">Logo:</label>
                <input type="file" name="logo" class="form-control">
                <img src="{{ $store->logo ? asset('storage/' . $store->logo) : asset('default-logo.png') }}" alt="Store Logo" style="width: 50px; height: 50px; border-radius: 5px;">
                @error('logo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="address" class="form-label">Address:</label>
                <input type="text" name="address" class="form-control" value="{{ $store->address }}" required>
                @error('address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="name" class="form-label">Store Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $store->name }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="website" class="form-label">Website:</label>
                <input type="url" name="website" class="form-control" value="{{ $store->website }}">
                @error('website')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="phone" class="form-label">Phone:</label>
                <input type="text" name="phone" class="form-control" value="{{ $store->phone }}" required id="phone">
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div id="phoneError" class="text-danger" style="display: none;">Phone number must be 10 digits.</div>
            </div>
            <div class="col-md-6">
                <label for="open_hours" class="form-label">Open Hours:</label>
                <input type="text" name="open_hours" class="form-control" value="{{ $store->open_hours }}" required>
                @error('open_hours')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" value="{{ $store->email }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-success">Update Store</button>
        <a href="{{ route('stores.index') }}" class="btn btn-secondary">Cancel</a>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#phone').on('input', function() {
                var phone = $(this).val();
                if (phone.length !== 10 || !/^\d+$/.test(phone)) {
                    $('#phoneError').show();
                } else {
                    $('#phoneError').hide();
                }
            });
        });
    </script>
@endsection
