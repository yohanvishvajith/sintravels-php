@extends('Layouts.Auth')
@section('title', 'Reset Password - SIN Travels')
@push('styles')
@vite(['resources/css/auth/register.css'])
@endpush

@section('content')
<div class="register-root">
    <div class="register-card">
        <h2 class="register-title">Reset Password</h2>

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

        <form method="POST" action="/reset-password" class="register-form">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="field">
                <label for="email">Email address</label>
                <input type="email" id="email" name="email" value="{{ old('email', $email) }}" required readonly>
            </div>

            <div class="field">
                <label for="password">New Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="field">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn-primary">Reset Password</button>
        </form>

        <p class="register-cta"><a href="/login">Back to login</a></p>
    </div>
</div>

@endsection
