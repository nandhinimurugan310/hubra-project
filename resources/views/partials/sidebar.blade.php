<div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="{{ route('admin.index') }}">Manage Users</a>
    <a href="{{ route('stores.index') }}">Manage Store</a> <!-- Added Manage Store link -->
    <a href="#" onclick="document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>
