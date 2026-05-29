@extends('Layouts.Auth')

@push('styles')
@vite(['resources/css/auth/register.css'])
@endpush
@section('title', 'Login - SIN Travels')
@section('content')
<div class="register-root">
    <div class="register-card">
        <h2 class="register-title">Sign in to your account</h2>

        @if($errors->any())
        <div class="register-errors">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(session('success'))
        <div class="register-success">
            {{ session('success') }}
        </div>
        @endif

        <form method="POST" action="/login" class="register-form">
            @csrf
            <div class="field">
                <label for="email">Email address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="forgot-password-link">
                <a href="/forgot-password">Forgot password?</a>
            </div>

            <button type="submit" class="btn-primary">Sign In</button>
        </form>

        <p class="register-cta">Don't have an account? <a href="/register">Register here</a></p>
    </div>
</div>

@endsection