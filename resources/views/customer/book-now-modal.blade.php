<div class="modal fade" id="bookingModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content border-0 shadow-lg rounded-4 p-4" style="background-color: #fff;">
            <div class="text-center">
                <div class="mb-2">
                    <div style="font-size: 3rem; color: #4caf50;">&#10003;</div>
                </div>

                <h4 class="fw-bold mb-2" style="color: #333;">Confirm Your Booking</h4>

                <p id="modalText" class="text-muted mb-4" style="font-size: 0.95rem;">
                    Do you want to book this service now?<br>
                    You can see it in your booking history afterward.
                </p>
            </div>

            <form method="POST" id="book_now_form">
                @csrf
                <input type="hidden" name="service_id" id="service_id">
                <x-inputbox label="Booking Date" name="booking_date" required="required" placeholder="YYYY-MM-DD"/>
            </form>

            <div class="d-flex justify-content-center gap-2 mt-3">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success btn-sm" id="confirmBookingBtn"><span></span> Confirm</button>
            </div>
        </div>
    </div>
</div>
