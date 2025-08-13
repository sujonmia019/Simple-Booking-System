<div id="topbar">
    <div>
        <h2 class="mb-0">{{ $title }}</h2>
        @if ($subTitle)
        <small>{{ $subTitle }}</small>
        @endif
    </div>
    <div>
        <div class="admin-info pe-0">
            <img src="{{ user_image() }}" alt="Admin Profile" />
            <div class="admin-text">
                <strong>{{ auth()->user()->full_name }}</strong>
                <small>{{ auth()->user()->role_name == ADMIN_ROLE ? 'Administrator' : 'Customer' }}</small>
            </div>
        </div>
    </div>
</div>
