<div id="topbar">
    <div>
        <h2 class="mb-0">Dashboard</h2>
        <small>Welcome back, manage your service bookings</small>
    </div>
    <div>
        <div class="admin-info">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Admin Profile" />
            <div class="admin-text">
                <strong>{{ auth()->user()->name }}</strong>
                <small>{{ auth()->user()->role_name == ADMIN_ROLE ? 'Administrator' : 'Customer' }}</small>
            </div>
        </div>
    </div>
</div>
