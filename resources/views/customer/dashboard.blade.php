@extends('layouts.customer')
@section('stieTitle', $siteTitle)
@push('styles')
<style>
    .modal-header {
        background-color: #0d6efd;
        color: #fff;
        border-bottom: none;
    }
    .modal-title {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 600;
    }
    .modal-body {
        background-color: #fff;
        padding: 2rem;
        border-radius: 0.5rem;
    }
    .modal-footer {
        border-top: none;
        justify-content: flex-end;
    }
    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
    }
    .btn-primary {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }
    .btn-primary:hover {
        background-color: #0b5ed7;
        border-color: #0b5ed7;
    }
    label {
        margin-bottom: 2px !important;
        font-size: 14px;
    }
    .required::after {
        content: '*';
        color: red;
    }
</style>
@endpush
@section('content')

<!-- Welcome Section -->
<div class="section-header">
    <h2>Welcome Back!</h2>
    <p>Choose a service below to book instantly</p>
</div>

<!-- Services -->
<div class="row g-4 mb-5">
    @forelse ($services as $service)
    <div class="col-lg-3 col-md-6">
        <div class="service-card">
            <h5>{{ $service->name }}</h5>
            <p>{{ $service->description }}</p>
            <p class="fw-bold">{{ config('app.currency') }}{{ $service->price }}</p>
            <button class="btn btn-book w-100 book_now" data-id="{{ $service->id }}">Book Now</button>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="text-center text-danger">
            <b>Service Not Availlable!</b>
        </div>
    </div>
    @endforelse
</div>

<!-- Booking History -->
<div class="booking-history mb-5">
    <h5>Booking History</h5>
    <div class="history-container">
        <div class="row g-3">
            @forelse ($histories as $booking)
            <div class="col-md-6 col-lg-4">
                <div class="history-card">
                    <div>
                        <h6>{{ $booking->service->name }}</h6>
                        <small>{{ date_formated($booking->booking_date, 'Y-m-d') }}</small>
                    </div>
                    {!! BOOKING_STATUS_LABEL[$booking->status] !!}
                </div>
            </div>
            @empty
                <div class="col-12">
                    <div class="text-center text-danger">
                        <b>Your are not yet booking!</b>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>

@include('customer.book-now-modal')

@endsection

@push('scripts')
<script>
    var bookModal = new bootstrap.Modal(document.getElementById('bookingModal'), {
        keyboard: false,
        backdrop: 'static'
    });

    flatpickr("#booking_date", {
        altInput: false,
        dateFormat: "Y-m-d",
        minDate: "today"
    });

    $(document).on('click', '.book_now', function(){
        var bookId = $(this).data('id');
        $('#book_now_form input#service_id').val(bookId);
        bookModal.show();
    });

    $(document).on('click','#confirmBookingBtn',function(){
        var form = document.getElementById('book_now_form');
        var formData = new FormData(form);
        $.ajax({
            url: "{{ route('app.customer.book-now') }}",
            type: "POST",
            data: formData,
            dataType: "JSON",
            contentType: false,
            processData: false,
            cache: false,
            beforeSend: function(){
                $('#confirmBookingBtn span').addClass('spinner-border spinner-border-sm text-light');
            },
            complete: function(){
                $('#confirmBookingBtn span').removeClass('spinner-border spinner-border-sm text-light');
            },
            success: function (data) {
                $('#book_now_form').find('.is-invalid').removeClass('is-invalid');
                $('#book_now_form').find('.error').remove();
                if (data.status == false) {
                    $.each(data.errors, function (key, value) {
                        $('#book_now_form #' + key).parent().append(
                            '<small class="error d-block text-left text-danger">' + value + '</small>');
                    });
                } else {
                    notification(data.status, data.message);
                    if (data.status == 'success') {
                        setTimeout(() => {
                            window.location.reload(true);
                        }, 1000);
                    }
                }
            },
            error: function (xhr, ajaxOption, thrownError) {
                console.log(thrownError + '\r\n' + xhr.statusText + '\r\n' + xhr.responseText);
            }
        });
    });
</script>
@endpush
