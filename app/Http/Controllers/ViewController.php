<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ViewController extends Controller
{

    public function index()
    {
        return view('welcome');

    }

    public function profile($id){
        return view('profile', ['id' => $id]);
    }

    public function upload()
    {
        return view('upload');
    }

    public function edit()
    {
        return view('edit');
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
