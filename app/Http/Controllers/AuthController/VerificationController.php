<?php

namespace App\Http\Controllers\AuthController;

use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class VerificationController extends Controller
{
    public function verifyEmail(Request $request, $id) {
        if (! URL::hasValidSignature($request)) {
            abort(401);
        }

        $user = User::findOrFail($id);
        if (!$user->email_verified_at) {
            $user->email_verified_at = now();
            $user->save();
        }

        return redirect()->route('login')->with('message', 'Email verified successfully!');
    }

    public function notice() {
        return view('auth.verify-email');
    }

    public function resend(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        
        $user = User::where('email', $request->email)->first();

        if ($user && ! $user->email_verified_at) {
            Mail::to($user->email)->send(new VerifyEmail($user));
            return redirect()->route('verification.notice')->with('message', 'Verification email has been sent to your email to verify your account!');
        }

        return redirect()->route('login')->with('message', 'Your email is already verified!');

    }
}
