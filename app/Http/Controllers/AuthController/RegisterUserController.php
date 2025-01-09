<?php

namespace App\Http\Controllers\AuthController;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterUserController extends Controller
{
    public function create() {
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

      Auth::login($user);

    return to_route('admin-dashboard')->with('message', 'Registration successfully!');

    }
}
