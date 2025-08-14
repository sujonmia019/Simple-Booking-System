@extends('layouts.app')
@section('site_title', $siteTitle)
@push('styles')
<style>
    .booking-status-select-wrapper {
        position: relative;
        display: inline-block;
    }

    .booking-status-select {
        appearance: none;
        padding: 3px 25px 3px 12px;
        font-size: 14px;
        border: 1px solid #ddd;
        border-radius: 0;
        background-color: #fff;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .booking-status-select:hover {
        border-color: #888;
    }
    .booking-status-select:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: none;
    }

    .booking-status-select-wrapper::after {
        content: "▼";
        font-size: 10px;
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #363333;
        pointer-events: none;
    }
</style>
@endpush
@section('content')
<div class="row my-4">
    <div class="col-md-12 col-sm-12">
        <div class="card border-0 shadow-sm rounded-0">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-hover table-striped mb-0" id="datatable">
                        <thead>
                            <th>SL</th>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Booking Status</th>
                            <th>Service Name</th>
                            <th>Price</th>
                            <th>Booking Date</th>
                        </thead>
                        <tbody>
                            @forelse ($bookings as $booking)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $booking->user->full_name }}</td>
                                <td>{{ $booking->user->email }}</td>
                                <td>{{ $booking->user->phone_number }}</td>
                                <td>
                                   <div class="booking-status-select-wrapper">
                                        <select class="booking-status-select status-select" data-id="{{ $booking->id }}" id="booking_status">
                                            @foreach (BOOKING_STATUS as $index=>$value)
                                            <option value="{{ $index }}" data-color="{{ BOOKING_STATUS_COLORS[$index] }}" {{ $booking->status == $index ? 'selected' : '' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                   </div>
                                </td>
                                <td>{{ $booking->service->name }}</td>
                                <td>{{ config('app.currency') }}{{ $booking->service->price }}</td>
                                <td>{{ date_formated($booking->booking_date, 'Y-m-d') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center text-danger">Bookings records empty!</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
    <script>
        $('#datatable').DataTable({
            order: [],
            bInfo: true,
            bFilter: true,
            ordering: false,
            lengthMenu: [
                [5, 10, 15, 25, 50, 100, 200],
                [5, 10, 15, 25, 50, 100, 200]
            ],
            pageLength: "{{ TABLE_PAGE_LENGTH }}",
            dom: "<'row mb-2'<'col-sm-8 d-flex'lf><'col-sm-4 text-end'B>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row mt-0'<'col-sm-5'i><'col-sm-7'p>>",
            language: {
                lengthMenu: "_MENU_ ",
                search: "",
                searchPlaceholder: "Type to filter..."
            }
        });

        function setSelectColor($select) {
            var color = $select.find('option:selected').data('color');
            $select.css({
                backgroundColor: color,
                color: '#363333'
            });
        }

        $('.status-select').each(function () {
            setSelectColor($(this));
        });

        $(document).on('change','#booking_status', function () {
            var $select = $(this);
            setSelectColor($select);

            var bookingId = $select.data('id');
            var status = $select.val();

            Swal.fire({
                title: 'Are you sure to status update?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Confirm',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{ route('app.bookings.status-changes') }}",
                        type: "POST",
                        data: {
                            id: bookingId,
                            status: status,
                            _token: _token
                        },
                        dataType: "JSON",
                    }).done(function (response) {
                        if(response.status == "success") {
                            notification('success', 'Booking status updated.');
                            setTimeout(() => {
                                window.location.reload(true);
                            }, 1000);
                        }else {
                            Swal.fire('Oops...', 'Somthing went wrong!', "error");
                        }
                    }).fail(function () {
                        Swal.fire('Oops...', "Somthing went wrong with ajax!", "error");
                    });
                }
            });
        });
    </script>
@endpush
