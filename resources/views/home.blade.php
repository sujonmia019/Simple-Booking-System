@extends('layouts.app')
@section('site_title', $siteTitle)
@push('styles')
<style>
    .bg-cyan    {background-color: #17a2b8 !important;}
    .bg-teal    {background-color: #20c997 !important;}
    .bg-indigo  {background-color: #6610f2 !important;}
    .bg-dark    {background-color: #343a40 !important;}
    .bg-blue    {background-color: #007bff !important;}
    .bg-pink    {background-color: #e83e8c !important;}
    .bg-orange  {background-color: #fd7e14 !important;}
    .bg-purple  {background-color: #6f42c1 !important;}
</style>
@endpush
@section('content')
<div class="row mt-4">
    <div class="col-sm-6 col-md-3">
        <div class="stat-card text-center bg-cyan">
            <div class="title">Total Services</div>
            <div class="value">{{ $servicesCounts->total }}</div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="stat-card text-center bg-teal">
            <div class="title">Active Services</div>
            <div class="value">{{ $servicesCounts->active }}</div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="stat-card text-center bg-indigo">
            <div class="title">Total Bookings</div>
            <div class="value">{{ $bookingsCounts->total }}</div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="stat-card text-center bg-dark">
            <div class="title">Pending Bookings</div>
            <div class="value">{{ $bookingsCounts->pending }}</div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-sm-6 col-md-3">
        <div class="stat-card text-center bg-blue">
            <div class="title">Confirmed Bookings</div>
            <div class="value">{{ $bookingsCounts->confirmed }}</div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="stat-card text-center bg-pink">
            <div class="title">Cancelled Bookings</div>
            <div class="value">{{ $bookingsCounts->cancelled }}</div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="stat-card text-center bg-orange">
            <div class="title">Total Revenue</div>
            <div class="value">{{ $totalRevenue }}</div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="stat-card text-center bg-purple">
            <div class="title">Total Customers</div>
            <div class="value">{{ $totalCustomers }}</div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-sm-12 col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-2">
                <h4 class="card-title mb-0">Service popularity</h4>
            </div>
            <div class="card-body">
                <canvas id="servicePopularityChart" height="365"></canvas>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-2">
                <h4 class="card-title mb-0">Booking status distribution</h4>
            </div>
            <div class="card-body">
                <canvas id="bookingStatusChart" height="365"></canvas>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const serviceCanvas = document.getElementById('servicePopularityChart').getContext('2d');
    const statusCanvas = document.getElementById('bookingStatusChart').getContext('2d');

    const serviceLabel = @json($servicePopularity->pluck('name'));
    const serviceData = @json($servicePopularity->pluck('total'));

    console.log(serviceLabel)

    const bookingStatusLabel = @json($bookingStatusDist->pluck('status_label'));
    const bookingStatusData = @json($bookingStatusDist->pluck('total'));

    // Service Popularity Bar Chart
    new Chart(serviceCanvas, {
        type: 'bar',
        data: {
            labels: serviceLabel,
            datasets: [{
                label: 'Bookings per Service',
                data: serviceData,
                backgroundColor: 'rgba(54, 162, 235, 0.6)'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: { y: { beginAtZero: true } }
        }
    });

    // Booking Status Pie Chart
    new Chart(statusCanvas, {
        type: 'pie',
        data: {
            labels: bookingStatusLabel,
            datasets: [{
                data: bookingStatusData,
                backgroundColor: [
                    '#facc15', // Pending
                    '#22c55e', // Confirmed
                    '#ef4444'  // Cancelled
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>
@endpush
