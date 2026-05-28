@extends('Layouts.Auth')

@push('styles')
@vite(['resources/css/auth/register.css'])
@endpush

@section('content')
<div class="register-root">
    <div class="register-card">
        <h2 class="register-title">Create your account</h2>

        @if($errors->any())
        <div class="register-errors">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="/register" class="register-form">
            @csrf
            <div class="field">
                <label for="name">Full name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
            </div>

            <div class="field">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" required>
            </div>

            <div class="field">
                <label for="email">Email address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="field two-cols">
                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div>
                    <label for="password_confirmation">Confirm</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </div>
            </div>

            <button type="submit" class="btn-primary">Register</button>
        </form>

        <p class="register-cta">Already have an account? <a href="/login">Sign in</a></p>
    </div>
</div>

@endsection