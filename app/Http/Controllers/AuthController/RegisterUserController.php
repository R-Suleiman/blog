<?php

namespace App\Http\Controllers\AuthController;

use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rules\Password;

class RegisterUserController extends Controller
{
    public function create() {
        if(Auth::guard('admin')->check() || Auth::guard('web')->check()) {
            return redirect()->route('index');
        }

        return view("auth.register");
    }

    public function store(Request $request) {
       $attributes = $request->validate([
        'first_name' => ['required', 'min:3'],
        'last_name' => ['required', 'min:3'],
        'email'=> ['required', 'email', 'unique:admins,email', 'unique:users,email'],
        'password' => ['required', Password::min(6), 'confirmed'],
       ]);

      $user = User::create($attributes);

      // send verification email
      Mail::to($user->email)->send(new VerifyEmail($user));

       return redirect()->route('login')->with('message', 'Verification email has been sent to your email to verify your account!');

    }
}
