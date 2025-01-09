<?php

namespace App\Http\Controllers\Admins;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;

class AdminProfileController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(Admin $profile)
    {
        $admin = Admin::where('id', $profile->id)->first();

        return view('admin.profile.show', ['admin'=> $admin]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $profile)
    {
        return view("admin.profile.edit", ["admin"=> $profile]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $profile)
    {
        $updatedProfile = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required','email'],
            'title' => 'required',
            'rank' => 'required',
            'bio' => 'nullable',
            'photo' => 'nullable',
        ]);

        $photo_name = $profile->photo;
        if($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $path = 'images/profile/admin/';
            $photo_name = $photo->getClientOriginalName() . '-' . time() . '.' . $photo->getClientOriginalExtension();
            $photo->storeAs($path, $photo_name, 'public');

            // removing the existing profile photo
            $existingPhoto = $path . $profile->photo;
            if($profile->photo && Storage::disk('public')->exists($existingPhoto)) {
                Storage::disk('public')->delete($existingPhoto);
            }
        }

            $updatedProfile['photo'] = $photo_name;
            $updatedProfile['rank'] = 1;

            $profile->update($updatedProfile);

            return to_route('admin.profile.show', $profile)->with('message', 'Profile Updated Successfully');
    }

}
