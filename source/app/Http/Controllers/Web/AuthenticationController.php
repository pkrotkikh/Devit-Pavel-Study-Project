<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view("content/login");
    }

    public function register()
    {
        return "register";
    }
}
