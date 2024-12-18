<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view("index");
    }

    public function contact() {
        return view("contact");
    }

    public function latest() {
        return view("latest");
    }

    public function post() {
        return view("post");
    }
}
