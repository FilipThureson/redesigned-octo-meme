<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::select('select * from users');

        return var_dump($users);
    }

    public function login()
    {
        return view("login");
    }
    public function loginAuth()
    {
        return "authtesting...";
    }
}