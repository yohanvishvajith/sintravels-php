<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);

        if ($validator->fails()) {
            if ($request->expectsJson()) {
                return response()->json($validator->errors(), 422);
            }

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
      
        ]);

        // For API requests, return JSON response
        if ($request->expectsJson()) {
            $token = $user->createToken('api-token')->plainTextToken;

            return response()->json([
                'message' => 'User registered successfully',
                'token' => $token,
                'user' => $user
            ], 201);
        }

        // For web requests, log the user in and redirect
        Auth::login($user);
        return redirect('/dashboard')
            ->with('success', 'Registration successful! Welcome to SIN Travels.');
        // return redirect()->route('admin.dashboard')
        //     ->with('success', 'Registration successful! Welcome to SIN Travels Admin.');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if (! $user instanceof User) {
                if ($request->expectsJson()) {
                    return response()->json([
                        'message' => 'Authenticated user not found'
                    ], 401);
                }

                return redirect()->back()
                    ->withErrors(['email' => 'Authenticated user not found'])
                    ->withInput($request->only('email'));
            }

            // For API requests, return JSON with token
            if ($request->expectsJson()) {
                $token = $user->createToken('api-token')->plainTextToken;
                return response()->json([
                    'message' => 'Login successful',
                    'token' => $token,
                    'user' => $user
                ]);
            }

            // For web requests, redirect based on role
            return redirect()->intended(route('admin.dashboard')) ->with('success', 'Welcome back!');


     
        }

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        return redirect()->back()
            ->withErrors(['email' => 'Invalid credentials'])
            ->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        if ($request->expectsJson()) {
            $request->user()->currentAccessToken()->delete();
            return response()->json(['message' => 'Logged out successfully']);
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')
            ->with('success', 'You have been logged out.');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            if ($request->wantsJson()) {
                return response()->json(['error' => 'Email address not found'], 404);
            }
            return redirect()->back()
                ->withErrors(['email' => 'Email address not found'])
                ->withInput();
        }

        // Generate a unique token
        $token = Str::random(60);

        // Store the reset token in database
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => Hash::make($token),
                'created_at' => Carbon::now()
            ]
        );

        // Generate the reset link
        $resetLink = route('password.reset', ['token' => $token, 'email' => $request->email]);

        // If AJAX/fetch request, return JSON
        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Password reset link generated',
                'link' => $resetLink
            ]);
        }

        // For normal form submissions, return with session data
        return redirect()->back()
            ->with('success', "Password reset link generated! Use this link: " . $resetLink);
    }

    public function showResetForm(Request $request)
    {
        $token = $request->token;
        $email = $request->email;

        // Verify the token exists and is not expired
        $resetRecord = DB::table('password_reset_tokens')
            ->where('email', $email)
            ->first();

        if (!$resetRecord || !Hash::check($token, $resetRecord->token)) {
            return redirect('/login')
                ->withErrors(['token' => 'Invalid or expired password reset link']);
        }

        // Check if token is older than 60 minutes
        $createdAt = Carbon::parse($resetRecord->created_at);
        if ($createdAt->addMinutes(60)->isPast()) {
            DB::table('password_reset_tokens')->where('email', $email)->delete();
            return redirect('/login')
                ->withErrors(['token' => 'Password reset link has expired']);
        }

        return view('Auth.reset-password', compact('token', 'email'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|string|min:6|confirmed'
        ]);

        // Verify the token
        $resetRecord = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->first();

        if (!$resetRecord || !Hash::check($request->token, $resetRecord->token)) {
            return redirect()->back()
                ->withErrors(['token' => 'Invalid password reset token']);
        }

        // Update user password
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->update(['password' => Hash::make($request->password)]);
            DB::table('password_reset_tokens')->where('email', $request->email)->delete();

            return redirect('/login')
                ->with('success', 'Password reset successfully! Please log in with your new password.');
        }

        return redirect()->back()
            ->withErrors(['email' => 'User not found']);
    }
}
