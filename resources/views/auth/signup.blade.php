@extends('auth.app')
@section('title', 'Signin')
@section('content')
    <!-- Login Header -->
    @include('auth.include.topbar', ['content'=>'Sign in to access your customer dashboard'])

    <form id="adminLoginForm">
        @csrf
        <div class="mb-3">
            <label class="form-label required">Full Name</label>
            <div class="input-group">
                <i class="fas fa-user input-icon"></i>
                <input type="text" class="form-control form-control-sm shadow-none" name="full_name" placeholder="Enter your full name" required>
            </div>
            @error('full_name')
                <small class="text-danger d-block">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label required">Phone No.</label>
            <div class="input-group">
                <i class="fas fa-envelope input-icon"></i>
                <input type="tel" class="form-control form-control-sm shadow-none" name="phone_number" placeholder="Enter your number" required>
            </div>
            @error('phone_number')
                <small class="text-danger d-block">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label required">Email</label>
            <div class="input-group">
                <i class="fas fa-envelope input-icon"></i>
                <input type="email" class="form-control form-control-sm shadow-none" name="email" placeholder="Enter your email" required>
            </div>
            @error('email')
                <small class="text-danger d-block">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label required">Password</label>
            <div class="input-group">
                <i class="fas fa-lock input-icon"></i>
                <input type="password" class="form-control form-control-sm shadow-none" name="password" placeholder="Enter your password" required>
                <button type="button" class="password-toggle" onclick="togglePassword(this)">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
            @error('password')
                <small class="text-danger d-block">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label required">Confirm Password</label>
            <div class="input-group">
                <i class="fas fa-lock input-icon"></i>
                <input type="password" class="form-control form-control-sm shadow-none" name="password_confirmation" placeholder="Enter your confirm password" required>
                <button type="button" class="password-toggle" onclick="togglePassword(this)">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
            @error('password_confirmation')
                <small class="text-danger d-block">{{ $message }}</small>
            @enderror
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
            Sign Up
        </button>

        <div class="divider mb-2">
            <span>I have a customer account? <a href="{{ url('signin') }}" class="text-decoration-none fw-semibold">Signin</a></span>
        </div>
    </form>
@endsection
