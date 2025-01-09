<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserDashboardController extends Controller
{

    public function index()
    {
        $user = Auth::guard("web")->user();
        return view('user.profile.index', ['user' => $user]);
    }

    public function editProfile(Request $request) {
        $user = Auth::guard("web")->user();
        return view('user.profile.edit', ['user' => $user]);
    }

    public function updateProfile(Request $request) {
        $updated_user = $request->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'email' => ['required','email'],
            'photo' => 'nullable',
        ]);

        $user = Auth::guard('web')->user();

        $photo_name = $user->photo;
        if($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $path = 'images/profile/user/';
            $photo_name = $photo->getClientOriginalName() . '-' . time() . '.' . $photo->getClientOriginalExtension();
            $photo->storeAs($path, $photo_name, 'public');

            // removing the existing profile photo
            $existingPhoto = $path . $user->photo;
            if($user->photo && Storage::disk('public')->exists($existingPhoto)) {
                Storage::disk('public')->delete($existingPhoto);
            }
        }

            $updated_user['photo'] = $photo_name;
            $updated_user['password'] = $user->password;

            // dd($updated_admin);
            $user->update($updated_user);

            return to_route('user.index', $user)->with('message', 'Profile Updated Successfully');
    }

    public function changePassword() {
        return view('user.passwords.edit');
    }

    public function updatePassword(Request $request) {
        $user = Auth::guard('web')->user();
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required', 'min:8', 'confirmed'],
        ]);

        if(Hash::check($request->current_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);
            return redirect()->route('user.index')->with('message', 'Password Updated Successfully');
        } else {
            return back()->with('error', 'Current Password is incorrect');
        }
    }

}
