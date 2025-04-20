<?php

namespace App\Http\Controllers\AuthController;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create()
    {
        if (Auth::guard('admin')->check() || Auth::guard('web')->check()) {
            return redirect()->route('index');
        }

        return view('auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        $user = User::where('email', $credentials['email'])->first();
        if ($user && !$user->email_verified_at) {
            return redirect()->route('verification.notice')->with('error', 'Your email is not verified. Please check your email for verification link or request a new verification email.');
        }

        // attempt to login as user
        if (Auth::guard('web')->attempt($credentials)) {
            request()->session()->regenerate();
            return to_route('user.index')->with('message', 'Successfully Logged In');
        }
        ;

        // attempt to login as admin
        if (Auth::guard('admin')->attempt($credentials)) {
            request()->session()->regenerate();
            return to_route('admin.dashboard')->with('message', 'Successfully Logged In');
        }
        ;

        throw ValidationException::withMessages([
            'email' => 'Invalid Credentials'
        ]);

    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login')->with('message', 'Successfully Logged Out');
    }
}
