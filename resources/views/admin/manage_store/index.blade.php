@extends('layouts.admin')

@section('title', 'Manage Stores')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Manage Stores</h2>
        <a href="{{ route('stores.create') }}" class="btn btn-primary">Add New Store</a>
    </div>
          <!-- Success and Error Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <table id="storesTable" class="table table-striped table-bordered ">
        <thead class="table-dark">
            <tr>
            <th>S.No</th>
                <th>Logo</th>
                <th>Address</th>
                <th>Name</th>
                <th>Website</th>
                <th>Phone</th>
                <th>Open Hours</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stores as $key=>$store)
                <tr>
                <td>{{ $key+1 }}</td>
                    <td>
                        <img src="{{ $store->logo ? asset('storage/' . $store->logo) : asset('default-logo.png') }}" alt="Store Logo" style="width: 50px; height: 50px; border-radius: 5px;">
                    </td>
                    <td>{{ $store->address }}</td>
                    <td>{{ $store->name }}</td>
                    <td>{{ $store->website }}</td>
                    <td>{{ $store->phone }}</td>
                    <td>{{ $store->open_hours }}</td>
                    <td>{{ $store->email }}</td>
                    <td>
                        <a href="{{ route('stores.edit', $store->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('stores.destroy', $store->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#storesTable').DataTable(); // Initialize DataTable
    });
</script>
@endpush
