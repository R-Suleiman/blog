<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage;

class AdminController extends Controller
{
    public function index()
    {
        $myPostsCount = Post::where('admin_id', Auth::guard('admin')->user()->id)->count();
        $OtherPostsCount = Post::where('admin_id', '!=', Auth::guard('admin')->user()->id)->count();
        $guestAdminsCount = Admin::where('id','!=', Auth::guard('admin')->user()->id)->count();
        $usersCount = User::all()->count();

        return view("admin.index", ["myPosts"=> $myPostsCount,"otherPosts"=> $OtherPostsCount, "users"=> $usersCount, 'guestAdmins' => $guestAdminsCount]);
    }

}

