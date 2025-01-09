<?php

namespace App\Http\Controllers\RootAdmin;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Storage;

class GuestAdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $guestAdmins = Admin::where('rank', 0)->get();
        $guestAdmins = Admin::with('posts')->where('id', '!=', Auth::guard('admin')->user()->id)->get();

        return view('admin.guest-admins.index', ['admins' => $guestAdmins]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.guest-admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $admin = $request->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'email' => ['required','email', 'unique:admins,email', 'unique:users,email'],
            'password' => 'required',
            'title' => 'required',
            'rank' => 'nullable',
            'bio' => 'nullable',
            'photo' => 'nullable',
        ]);

        if($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $path = 'images/profile/admin/';
            $photo_name = $photo->getClientOriginalName() . '-' . time() . '.' . $photo->getClientOriginalExtension();
            $photo->storeAs($path, $photo_name, 'public');
            $admin['photo'] = $photo_name;
        }

        if($request->rank && $request->rank == 'on') {
            $admin['rank'] = 1;
        } else{
            $admin['rank'] = 0;
        }

        $admin['password'] = Hash::make($request->password);

        Admin::create($admin);
        return to_route('admin.guest-admin.index')->with('message', 'Admin Registered Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $guest_admin)
    {
        return view('admin.guest-admins.show', ['admin'=> $guest_admin]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $guest_admin)
    {
        return view('admin.guest-admins.edit', ['admin'=> $guest_admin]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $guest_admin)
    {
        $updated_admin = $request->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'email' => ['required','email'],
            // 'password' => 'required',
            'title' => 'required',
            'rank' => 'nullable',
            'bio' => 'nullable',
            'photo' => 'nullable',
        ]);

        $photo_name = $guest_admin->photo;
        if($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $path = 'images/profile/admin/';
            $photo_name = $photo->getClientOriginalName() . '-' . time() . '.' . $photo->getClientOriginalExtension();
            $photo->storeAs($path, $photo_name, 'public');

            // removing the existing profile photo
            $existingPhoto = $path . $guest_admin->photo;
            if($guest_admin->photo && Storage::disk('public')->exists($existingPhoto)) {
                Storage::disk('public')->delete($existingPhoto);
            }
        }

            $updated_admin['photo'] = $photo_name;
            $updated_admin['password'] = $guest_admin->password;
            if($request->rank && $request->rank == 'on') {
                $updated_admin['rank'] = 1;
            } else{
                $updated_admin['rank'] = 0;
            }

            // dd($updated_admin);
            $guest_admin->update($updated_admin);

            return to_route('admin.guest-admin.show', $guest_admin)->with('message', 'Admin Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $guest_admin)
    {
        $imagePath = 'images/profile/admin/';

        // delete the existing image
        $existingImage = $imagePath . $guest_admin->photo;
        if ($guest_admin->photo && Storage::disk('public')->exists($existingImage)) {
            Storage::disk('public')->delete($existingImage);
        }

        $guest_admin->delete();
        return to_route('admin.guest-admin.index')->with('message', 'Admin deleted Successfully!');
    }
}
