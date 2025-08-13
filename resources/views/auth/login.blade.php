@extends('auth.app')
@section('title', 'Signin')
@section('content')
    <!-- Login Header -->
    @include('auth.include.topbar', ['content'=>'Sign in to access your administrative dashboard'])

    <form id="adminLoginForm" method="POST" action="{{ route('login') }}">
        @csrf
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
                <input type="password" class="form-control form-control-sm shadow-none" name="password" id="password" placeholder="Enter your password" required>
                <button type="button" class="password-toggle" onclick="togglePassword(this)">
                    <i class="fas fa-eye"></i>
                </button>
            </div>      
            @error('password')
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
            Sign In to Dashboard
        </button>
    </form>

    <div class="divider">
        <span>I have a customer account</span>
    </div>

    <!-- Customer Links -->
    <div class="customer-links">
        <a href="{{ url('signin') }}" class="customer-link">
            <i class="fas fa-user fa-sm"></i>
            Customer Signin
        </a>
        <a href="{{ url('signup') }}" class="customer-link">
            <i class="fas fa-user-plus fa-sm"></i>
            Customer Signup
        </a>
    </div>
@endsection
