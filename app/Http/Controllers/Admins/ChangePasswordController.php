<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function changePassword() {
        return view('admin.passwords.edit');
    }

    public function updatePassword(Request $request) {
        $user = Auth::guard('admin')->user();
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required', 'min:8', 'confirmed'],
        ]);

        if(Hash::check($request->current_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);
            return redirect()->route('admin.profile.show', Auth::guard('admin')->user())->with('message', 'Password Updated Successfully');
        } else {
            return back()->with('error', 'Current Password is incorrect');
        }
    }
}
