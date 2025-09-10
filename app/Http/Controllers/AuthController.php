<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FA\Google2FA;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\LoginNotificationMail;





class AuthController extends Controller
{
    // Show the registration form
    public function showRegisterForm()
    {
        $countries = Country::all();
        return view('auth.register', compact('countries'));
    }

    // Handle registration
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:50',
            'last_name'  => 'required|string|max:50',
            'email'      => 'required|string|email|max:100|unique:users',
            'password'   => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'
            ],
            'country_id' => 'required|exists:countries,id',
        ], [
            'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'name'       => $request->first_name . ' ' . $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'country_id' => $request->country_id,
        ]);

        // 👇 Send Welcome Email
        Mail::to($user->email)->send(new WelcomeMail($user));

        return redirect()->route('register.form')->with('success', 'Registration successful! A welcome email has been sent.');
    }
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // ✅ Send email notification
            Mail::to($user->email)->send(new LoginNotificationMail($user));

            // ✅ Optional: log extra info
            // logger("User {$user->email} logged in at " . now() . " from IP: " . $request->ip());

            // Redirect to 2FA setup page with success flash
            return redirect()->route('twofa.prompt')
                ->with('success', 'Login successful! A confirmation email has been sent. Please set up Two-Factor Authentication.');
        }

        return redirect()->back()->with('error', 'Invalid email or password.');
    }



    public function showTwoFAPrompt()
    {
        return view('auth.twofa_prompt');
    }



    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form')->with('success', 'Logged out successfully!');
    }


    public function showEnableTwoFA()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login.form');
        }

        return view('auth.twofa_enable', [
            'qrCodeUrl' => null, // no QR yet
            'secret'    => null,
        ]);
    }

    public function generateTwoFA(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login.form');
        }

        $google2fa = new Google2FA();

        // Create a secret if not exists
        if (!$user->twofa_secret) {
            $user->twofa_secret = $google2fa->generateSecretKey(32);
            $user->save();
        }

        $secret = $user->twofa_secret;
        $issuer = config('app.name', 'Laravel');

        $label = rawurlencode($issuer) . ':' . rawurlencode($user->email);
        $qrCodeUrl = "otpauth://totp/{$label}?secret={$secret}&issuer=" . rawurlencode($issuer) . "&algorithm=SHA1&digits=6&period=30";

        return view('auth.twofa_enable', [
            'qrCodeUrl' => $qrCodeUrl,
            'secret'    => $secret,
        ]);
    }

    public function verifyTwoFA(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
        ]);

        $google2fa = new Google2FA();
        $user = Auth::user();

        $valid = $google2fa->verifyKey($user->twofa_secret, $request->otp);

        if ($valid) {
            $user->twofa_enabled = true;
            $user->save();

            return redirect()->route('dashboard')->with('success', 'Two-Factor Authentication enabled successfully!');
        }

        return redirect()->back()->with('error', 'Invalid code. Please try again.');
    }


    public function edit()
    {
        $countries = Country::all();
        return view('auth.edit', ['user' => Auth::user(), 'countries' => Country::all()]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name'  => 'required|string|max:50',
            'email'      => 'required|email|max:100|unique:users,email,' . $user->id,
            'phone_no'   => 'nullable|string|max:15',
            'alt_phone_no' => 'nullable|string|max:15',
            'state'      => 'nullable|string|max:100',
            'city'       => 'nullable|string|max:100',
            'pincode'    => 'nullable|string|max:10',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('profile_picture')) {
            $data['profile_picture'] = $request->file('profile_picture')->store('profiles', 'public');
        }

        $user->update($data);

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully!');
    }
}
