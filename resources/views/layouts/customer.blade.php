<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('stieTitle') - {{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/customer.css') }}">
    @stack('styles')
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light mb-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">BookIt</a>
            <div class="d-flex">
                <button class="btn btn-logout btn-sm logout-btn"><i class="fas fa-sign-out"></i> Logout</button>
                <form action="{{ route('logout') }}" method="POST" class="d-none" id="logout-form">
                    @csrf
                </form>
            </div>
        </div>
    </nav>

    <div class="container">

        @yield('content')

    </div>

    <footer>
        &copy; 2025 BookIt. All rights reserved.
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var _token = "{{ csrf_token() }}";

        // Sweetalert 2
        function notification(status, message){
            Swal.fire({
                position: "top-end",
                icon: status,
                title: message,
                showConfirmButton: false,
                timer: 2000,
                toast: true,
                padding: "10px",
                timerProgressBar: true,
                customClass: {
                    title: 'swal-title-custom',
                    popup: 'swal-custom-popup'
                }
            });
        }

        // user logout
        $(document).on('click','.logout-btn',function(e){
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: "You will be logged out!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, logout!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit(); // Submit normal form
                }
            });
        });

        // session flash message
        @if(session()->get('success'))
        notification('success',"{{ session()->get('success') }}")
        @elseif(session()->get('error'))
        notification('error',"{{ session()->get('error') }}")
        @elseif(session()->get('info'))
        notification('info',"{{ session()->get('info') }}")
        @elseif(session()->get('warning'))
        notification('warning',"{{ session()->get('warning') }}")
        @endif
    </script>

    @stack('scripts')
</body>

</html>
