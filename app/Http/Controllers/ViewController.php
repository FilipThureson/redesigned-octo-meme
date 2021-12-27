<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ViewController extends Controller
{

    public function index()
    {
        $users = DB::select('select * from users');

        return view('welcome');

    }

    public function login()
    {
        return view("login", ["loginerror" => ""]);
    }
    public function register()
    {
        return view("register", ["registererror" =>""]);
    }
    public function forgotPassword(){
        return view("forgotpass", ["loginerror" => ""]);
    }
    public function resetPassword($token){
        return view("resetPassword", ["token" => $token]);
    }

}
