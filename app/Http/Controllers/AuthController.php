<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Mail\TwoFactorCodeMail;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Retrieve the authenticated user
            $user = User::find(Auth::id());


            if (!$user) {
                Auth::logout();
                return back()->withErrors(['email' => 'User not found.']);
            }

            // Generate OTP
            $user->two_factor_code = rand(100000, 999999);
            $user->two_factor_expires_at = Carbon::now()->addMinutes(10); // Valid for 10 minutes
            $user->save();

            // Send OTP email
            Mail::to($user->email)->send(new TwoFactorCodeMail($user->two_factor_code));

            // Redirect to 2FA verification page
            return redirect()->route('verify.2fa');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Default role set to user
        ]);

        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Show the 2FA verification form
     */
    public function show2FAForm()
    {
        return view('auth.verify_2fa'); // Ensure this Blade file exists
    }

    /**
     * Verify the 2FA Code
     */
    public function verify2FA(Request $request)
    {
        $request->validate([
            'two_factor_code' => 'required|integer',
        ]);
    
        $user = User::find(Auth::id());
    
        if (!$user) {
            return redirect()->route('login')->withErrors(['email' => 'User not authenticated.']);
        }
    
        // Ensure `two_factor_expires_at` is a Carbon instance
        $expiresAt = Carbon::parse($user->two_factor_expires_at);
    
        // Check if the entered code matches the stored code and is not expired
        if ($user->two_factor_code == $request->two_factor_code && $expiresAt->isFuture()) {
            // Clear OTP after verification
            $user->two_factor_code = null;
            $user->two_factor_expires_at = null;
            $user->save();
    
            return redirect()->intended('/home'); // Redirect to home after successful 2FA
        }
    
        return back()->withErrors(['two_factor_code' => 'Invalid or expired OTP.']);
    }
    
    /**
     * Resend the 2FA code if the user requests it
     */
    public function resend2FA()
    {
        $user = User::find(Auth::id());


        if (!$user) {
            return redirect()->route('login')->withErrors(['email' => 'User not authenticated.']);
        }

        // Generate a new OTP
        $user->two_factor_code = rand(100000, 999999);
        $user->two_factor_expires_at = Carbon::now()->addMinutes(10);
        $user->save();

        // Resend OTP email
        Mail::to($user->email)->send(new TwoFactorCodeMail($user->two_factor_code));

        return back()->with('status', 'A new 2FA code has been sent to your email.');
    }
}
