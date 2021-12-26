<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ViewController extends Controller
{

    public function index()
    {
        $users = DB::select('select * from users');

        return var_dump($users);
    }

    public function login()
    {
        return view("login", ["loginerror" => ""]);
    }
    public function register()
    {
        return view("register", ["registererror" =>""]);
    }
}
