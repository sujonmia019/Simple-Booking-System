<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <style>
        .swal-title-custom {
            font-size: 16px !important;
            font-weight: 500 !important;
        }
        .swal2-timer-progress-bar {
            background-color: #d1cdcd !important; /* Bootstrap success green */
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="login-container">

        <!-- Login Form -->
        @yield('content')

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
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

        @if(session()->get('success'))
        notification('success',"{{ session()->get('success') }}")
        @elseif(session()->get('error'))
        notification('error',"{{ session()->get('error') }}")
        @endif

        function togglePassword(button) {
            const input = button.previousElementSibling;
            const icon = button.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>

    @stack('scripts')
</body>
</html>
