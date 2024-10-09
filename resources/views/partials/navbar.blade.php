<div class="navbar">
    <div>Admin Dashboard</div>
    <img src="{{ auth()->user()->profile_photo_path ? asset('storage/' . auth()->user()->profile_photo_path) : asset('default-avatar.png') }}" alt="Profile Photo">
</div>
