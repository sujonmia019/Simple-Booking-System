<nav id="sidebar" class="col-lg-2 d-lg-block d-none position-relative">
    <div class="px-3">
        <div class="mb-4 d-flex align-items-center gap-2">
            <div class="fs-4 fw-bold text-primary"><i class="fa-solid fa-calendar-check"></i> Booking</div>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}"><i class="fa-solid fa-gauge"></i> Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('app.customers.index') }}" class="nav-link {{ request()->is('customers') ? 'active' : '' }}"><i class="fa-solid fa-users"></i> Customers</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="fa-solid fa-wrench"></i> Services</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="fa-solid fa-book"></i> Bookings</a>
            </li>
        </ul>
    </div>
    <div class="mt-auto position-absolute bottom-0 w-100 px-3 mb-3">
        <button type="button" class="logout-btn"><i class="fas fa-sign-out"></i> Logout</button>
        <form action="{{ route('logout') }}" method="POST" class="d-none" id="logout-form">
            @csrf
        </form>
    </div>
</nav>
