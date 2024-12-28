<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Storage;

class GuestUsersController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $guestAdmins = Admin::where('rank', 0)->get();
        $guestUsers = User::orderBy('created_at', 'desc')->get();

        return view('admin.guest-users.index', ['users' => $guestUsers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.guest-users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'email' => ['required','email', 'unique:admins,email', 'unique:users,email'],
            'password' => 'required',
            'photo' => 'nullable',
        ]);

        if($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $path = 'images/profile/user/';
            $photo_name = $photo->getClientOriginalName() . '-' . time() . '.' . $photo->getClientOriginalExtension();
            $photo->storeAs($path, $photo_name, 'public');
            $user['photo'] = $photo_name;
        }

        $user['password'] = Hash::make($request->password);

        User::create($user);
        return to_route('admin.guest-user.index')->with('message', 'User Registered Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $guest_user)
    {
        return view('admin.guest-users.show', ['user'=> $guest_user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $guest_user)
    {
        return view('admin.guest-users.edit', ['user'=> $guest_user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $guest_user)
    {
        $updated_user = $request->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'email' => ['required','email'],
            'photo' => 'nullable',
        ]);

        $photo_name = $guest_user->photo;
        if($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $path = 'images/profile/user/';
            $photo_name = $photo->getClientOriginalName() . '-' . time() . '.' . $photo->getClientOriginalExtension();
            $photo->storeAs($path, $photo_name, 'public');

            // removing the existing profile photo
            $existingPhoto = $path . $guest_user->photo;
            if($guest_user->photo && Storage::disk('public')->exists($existingPhoto)) {
                Storage::disk('public')->delete($existingPhoto);
            }
        }

            $updated_user['photo'] = $photo_name;
            $updated_user['password'] = $guest_user->password;

            // dd($updated_admin);
            $guest_user->update($updated_user);

            return to_route('admin.guest-user.show', $guest_user)->with('message', 'User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $guest_user)
    {
        $imagePath = 'images/profile/user/';

        // delete the existing image
        $existingImage = $imagePath . $guest_user->photo;
        if ($guest_user->photo && Storage::disk('public')->exists($existingImage)) {
            Storage::disk('public')->delete($existingImage);
        }

        $guest_user->delete();
        return to_route('admin.guest-user.index')->with('message', 'User deleted Successfully!');
    }
}
