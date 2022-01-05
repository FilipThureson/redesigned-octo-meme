<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ViewController extends Controller
{

    public function index()
    {
        return view('welcome');

    }

    public function profile($id){
        return view('profile');
    }

    public function upload()
    {
        return view('upload');
    }

    public function login()
    {
        return view("login", ["loginerror" => ""]);
    }
    public function register()
    {
        return view("register", ["registererror" =>""]);
    }
    public function forgotPassword()
    {
        return view("forgotpass", ["loginerror" => ""]);
    }
    public function resetPassword($token)
    {
        return view("resetPassword", ["token" => $token]);
    }

}
