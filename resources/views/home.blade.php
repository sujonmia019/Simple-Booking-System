@extends('layouts.app')
@section('site_title', $siteTitle)
@push('styles')

@endpush
@section('content')
<div class="row my-4 g-3">
    <div class="col-sm-6 col-md-3">
        <div class="stat-card text-center">
            <div class="title">Total Bookings</div>
            <div class="value">1,247</div>
            <div class="percent text-success">+12% from last month</div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="stat-card text-center">
            <div class="title">Active Services</div>
            <div class="value">24</div>
            <div class="percent text-success">+3 new services</div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="stat-card text-center">
            <div class="title">Revenue</div>
            <div class="value">$45,678</div>
            <div class="percent text-success">+8% from last month</div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="stat-card text-center">
            <div class="title">Total Customers</div>
            <div class="value">892</div>
            <div class="percent text-success">+15% from last month</div>
        </div>
    </div>
</div>

<!-- Panels row -->
<div class="row g-4">
    <!-- Recent Bookings -->
    <div class="col-lg-6 col-12">
        <div class="panel">
            <div class="panel-header">Recent Bookings <span class="text-primary"
                    style="font-weight:400; cursor:pointer; font-size:0.9rem;">View All</span></div>
            <div>
                <!-- Booking 1 -->
                <div class="booking-item">
                    <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Sarah Johnson" />
                    <div class="booking-info">
                        <p class="booking-name mb-0">Sarah Johnson</p>
                        <small class="booking-service">House Cleaning</small>
                    </div>
                    <div class="booking-status status-confirmed">Confirmed</div>
                </div>
                <!-- Booking 2 -->
                <div class="booking-item">
                    <img src="https://randomuser.me/api/portraits/men/48.jpg" alt="Mike Wilson" />
                    <div class="booking-info">
                        <p class="booking-name mb-0">Mike Wilson</p>
                        <small class="booking-service">Plumbing Service</small>
                    </div>
                    <div class="booking-status status-pending">Pending</div>
                </div>
                <!-- Booking 3 -->
                <div class="booking-item">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Emma Davis" />
                    <div class="booking-info">
                        <p class="booking-name mb-0">Emma Davis</p>
                        <small class="booking-service">Garden Maintenance</small>
                    </div>
                    <div class="booking-status status-progress">In Progress</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Popular Services -->
    <div class="col-lg-6 col-12">
        <div class="panel">
            <div class="panel-header">Popular Services <span class="text-primary"
                    style="font-weight:400; cursor:pointer; font-size:0.9rem;">Manage</span></div>
            <div>
                <div class="service-item">
                    <div class="service-left">
                        <div class="service-icon service-home"><i class="fa-solid fa-house"></i></div>
                        <div class="service-details">
                            <span>House Cleaning</span>
                            <small class="service-bookings">342 bookings</small>
                        </div>
                    </div>
                    <div class="service-price">$89</div>
                </div>
                <div class="service-item">
                    <div class="service-left">
                        <div class="service-icon service-plumbing"><i class="fa-solid fa-wrench"></i>
                        </div>
                        <div class="service-details">
                            <span>Plumbing Service</span>
                            <small class="service-bookings">287 bookings</small>
                        </div>
                    </div>
                    <div class="service-price">$125</div>
                </div>
                <div class="service-item">
                    <div class="service-left">
                        <div class="service-icon service-garden"><i class="fa-solid fa-tree"></i></div>
                        <div class="service-details">
                            <span>Garden Maintenance</span>
                            <small class="service-bookings">198 bookings</small>
                        </div>
                    </div>
                    <div class="service-price">$75</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')

@endpush
