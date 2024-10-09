@extends('layouts.admin')

@section('title', 'Add Store')

@section('content')
    <div class="mb-3">
        <h2>Add New Store</h2>
    </div>

    <form action="{{ route('stores.store') }}" method="POST" enctype="multipart/form-data" id="addStoreForm">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="logo" class="form-label">Logo:</label>
                <input type="file" name="logo" class="form-control" required id="logo">
                @error('logo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div id="logoError" class="text-danger" style="display: none;"></div>
            </div>
            <div class="col-md-6">
                <label for="address" class="form-label">Address:</label>
                <input type="text" name="address" class="form-control" required>
                @error('address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="name" class="form-label">Store Name:</label>
                <input type="text" name="name" class="form-control" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="website" class="form-label">Website:</label>
                <input type="url" name="website" class="form-control">
                @error('website')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="phone" class="form-label">Phone:</label>
                <input type="text" name="phone" class="form-control" required id="phone">
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div id="phoneError" class="text-danger" style="display: none;">Phone number must be 10 digits.</div>
            </div>
            <div class="col-md-6">
                <label for="open_hours" class="form-label">Open Hours:</label>
                <input type="text" name="open_hours" class="form-control" required>
                @error('open_hours')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-success" id="submitBtn">Add Store</button>
        <a href="{{ route('stores.index') }}" class="btn btn-secondary">Cancel</a>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Phone validation logic
            $('#phone').on('input', function() {
                var phone = $(this).val();
                if (phone.length !== 10 || !/^\d+$/.test(phone)) {
                    $('#phoneError').show();
                    $('#submitBtn').prop('disabled', true);
                } else {
                    $('#phoneError').hide();
                    $('#submitBtn').prop('disabled', false);
                }
            });

            // Logo validation logic
            $('#logo').on('change', function() {
                var file = this.files[0];
                var errorMessage = '';
                var validImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
                var maxSize = 2 * 1024 * 1024; // 2MB in bytes

                if (file) {
                    if ($.inArray(file.type, validImageTypes) === -1) {
                        errorMessage = 'Invalid file type. Only JPG, PNG, or GIF files are allowed.';
                    } else if (file.size > maxSize) {
                        errorMessage = 'File size must be less than 2MB.';
                    }
                }

                if (errorMessage) {
                    $('#logoError').text(errorMessage).show();
                    $('#submitBtn').prop('disabled', true); // Disable the submit button
                } else {
                    $('#logoError').hide();
                    $('#submitBtn').prop('disabled', false); // Enable the submit button
                }
            });
        });
    </script>
@endsection
