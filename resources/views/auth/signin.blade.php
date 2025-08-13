@extends('auth.app')
@section('title', 'Signin')
@section('content')
    <!-- Login Header -->
    @include('auth.include.topbar', ['content'=>'Sign in to access your customer dashboard'])

    <form id="adminLoginForm">
        <div class="mb-3">
            <label class="form-label required">Email</label>
            <div class="input-group">
                <i class="fas fa-envelope input-icon"></i>
                <input type="email" class="form-control form-control-sm shadow-none" placeholder="Enter your email" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label required">Password</label>
            <div class="input-group">
                <i class="fas fa-lock input-icon"></i>
                <input type="password" class="form-control form-control-sm shadow-none" placeholder="Enter your password" required>
                <button type="button" class="password-toggle" onclick="togglePassword(this)">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
        </div>

        <div class="form-options">
            <div class="form-check">
                <input class="form-check-input shadow-none" type="checkbox" id="remember">
                <label class="form-check-label" for="remember">
                    Remember me
                </label>
            </div>
        </div>

        <button type="submit" class="login-btn">
            <i class="fas fa-sign-in-alt"></i>
            Sign In to Dashboard
        </button>

        <div class="divider mb-2">
            <span>You don't have an account? <a href="{{ url('signup') }}" class="text-decoration-none fw-semibold">Sign Up</a></span>
        </div>
    </form>
@endsection
