@extends('Layouts.Auth')
@section('title', 'Forgot Password - SIN Travels')
@push('styles')
@vite(['resources/css/auth/register.css'])
<style>
    .toast-container {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        max-width: 400px;
    }
    .toast {
        background: #10b981;
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 8px;
        margin-bottom: 0.75rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        animation: slideIn 0.3s ease;
    }
    .toast.error {
        background: #ef4444;
    }
    @keyframes slideIn {
        from {
            transform: translateX(400px);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(400px);
            opacity: 0;
        }
    }
    .toast.removing {
        animation: slideOut 0.3s ease forwards;
    }
</style>
@endpush

@section('content')
<div class="register-root">
    <div class="register-card">
        <h2 class="register-title">Forgot Password</h2>
        <p class="register-subtitle">Enter your email address and we'll send you a password reset link.</p>

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

        <form method="POST" action="/forgot-password" class="register-form" id="forgot-password-form">
            @csrf
            <div class="field">
                <label for="email">Email address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <button type="submit" class="btn-primary" id="submit-btn">Send Reset Link</button>
        </form>

        <p class="register-cta">Remember your password? <a href="/login">Sign in here</a></p>
    </div>
</div>

<div class="toast-container" id="toast-container"></div>

<script>
function showToast(message, type = 'success') {
    const container = document.getElementById('toast-container');
    const toast = document.createElement('div');
    toast.className = `toast ${type}`;
    toast.textContent = message;
    container.appendChild(toast);

    setTimeout(() => {
        toast.classList.add('removing');
        setTimeout(() => toast.remove(), 300);
    }, 5000);
}

document.getElementById('forgot-password-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const form = this;
    const submitBtn = document.getElementById('submit-btn');
    const email = document.getElementById('email').value;
    const csrfToken = document.querySelector('input[name="_token"]').value;

    // Disable button and show countdown
    submitBtn.disabled = true;
    let seconds = 60;
    
    const originalText = submitBtn.textContent;
    submitBtn.textContent = `Resend in ${seconds}s`;

    const countdown = setInterval(() => {
        seconds--;
        submitBtn.textContent = `Resend in ${seconds}s`;
        
        if (seconds <= 0) {
            clearInterval(countdown);
            submitBtn.disabled = false;
            submitBtn.textContent = originalText;
        }
    }, 1000);

    // Submit form via fetch
    fetch('/forgot-password', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
        },
        body: new URLSearchParams({
            email: email,
            _token: csrfToken
        })
    })
    .then(response => {
        if (!response.ok) {
            return response.json().then(data => {
                throw new Error(data.error || 'Failed to send reset link');
            });
        }
        return response.json();
    })
    .then(data => {
        if (data.success && data.link) {
            const resetLink = data.link;
            
            // Log to console with styling
            console.log('%c🔑 Password Reset Link:', 'color: #0ea5a4; font-weight: bold; font-size: 14px;');
            console.log('%c' + resetLink, 'color: #10b981; font-size: 12px; word-break: break-all;');
            console.log('%c✅ Copy the link above and open it in your browser', 'color: #6366f1; font-style: italic;');
            
            showToast('Password reset link successfully sent. Check your email!', 'success');
        } else {
            throw new Error('Invalid response from server');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast(error.message || 'An error occurred. Please try again.', 'error');
        // Re-enable button on error
        clearInterval(countdown);
        submitBtn.disabled = false;
        submitBtn.textContent = originalText;
    });
});
</script>

@endsection
