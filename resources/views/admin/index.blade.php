@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Registered Users</h2>
    </div>

    <table id="usersTable" class="table table-striped table-bordered ">
        <thead class="table-dark">
            <tr>
            <th>S.No</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Profile Photo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $key=>$user)
                <tr>
                <td>{{ $key+1 }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>
                        <img src="{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : asset('default-avatar.png') }}" alt="Profile Photo" style="width: 50px; height: 50px; border-radius: 50%;">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#usersTable').DataTable(); // Initialize DataTable
    });
</script>
@endpush
