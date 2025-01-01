<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class ForgotPasswordController extends Controller
{
    public function forgotPassword() {
        return view('auth.forgot-password');
    }

    public function forgotPasswordStore(Request $request) {
        $request->validate([
            'email' => ['required', 'email']
        ]);

        $user = User::where('email', $request->email)->first();
        if(! $user) {
            $user = Admin::where('email', $request->email)->first();
            if(! $user) {
                return redirect()->back()->with('error', 'Email not Registered');
            }
        }

        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::to($request->email)->send(
            new ForgotPassword($token, $user)
        );

        // Send an Email (TO BE VERIFIED!!!!!)
        // Mail::send('mail.forgot-password', ['token' => $token], function($message) use ($request) {
        //     $message->to($request->email);
        //     $message->subject('Reset Password');
        // });


        return to_route('forgot-password')->with('success', 'A password reset link has been sent to your email');

    }

    public function resetPassword($token) {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function resetPasswordStore(Request $request) {
        $request->validate([
            'email' => ['email', 'required'],
            'password' => ['required', Password::min(6), 'confirmed']
        ]);

        $user = User::where('email', $request->email)->first();
        if(! $user) {
            $user = Admin::where('email', $request->email)->first();
            if(! $user) {
                return redirect()->back()->with('error', 'Email not Registered');
            }
        }

        //check for token validity
        $isTokenValid = DB::table('password_reset_tokens')->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

        if(! $isTokenValid) {
            return to_route('forgot-password')->with('error', 'Invalid token');
        }

        $user->update(['password' => Hash::make($request->password)]);

        // delete the token
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return to_route('login')->with('message', 'Password reset successfully');
    }

}
