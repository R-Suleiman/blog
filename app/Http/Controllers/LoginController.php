<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create() {
        return view('auth.login');
    }

    public function store(Request $request) {
       $credentials = $request->validate([
        'email'=> ['required', 'email'],
        'password' => 'required'
       ]);

       // attempt to login as user
       if (Auth::guard('web')->attempt($credentials)) {
       request()->session()->regenerate();
        return to_route('user.index')->with('message','Welcome User');
       };

       // attempt to login as admin
       if (Auth::guard('admin')->attempt($credentials)) {
       request()->session()->regenerate();
        return to_route('admin.dashboard')->with('message','Welcome Admin');
       };


        throw ValidationException::withMessages([
            'email' => 'Invalid Credentials'
        ]);

    }

    public function destroy(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login');
    }
}
