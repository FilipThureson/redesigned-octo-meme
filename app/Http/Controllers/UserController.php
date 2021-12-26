<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


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
        return view("login", ["loginerror" => ""]);
    }

    public function loginAuth(Request $request)
    {
        $inputEmail = filter_var($request->input('email'), FILTER_SANITIZE_SPECIAL_CHARS);
        $inputPassword = filter_var($request->input('password'), FILTER_SANITIZE_SPECIAL_CHARS);

        $passHashed = DB::table('users')->where('email', $inputEmail)->value("password");
        if(!$passHashed){
            return redirect("/login");//view("login", ["loginerror" => "Faulty email or password"]);
        }

        if (Hash::check($inputPassword, $passHashed))
        {
            return "logged in";

        }else{
            return redirect("/login");// view("login", ["loginerror" => "Faulty email or password"]);
        }
    }
    public function register(Request $request)
    {
        $data = [
            "firstname" => filter_var($request->input('firstname'), FILTER_SANITIZE_SPECIAL_CHARS),
            "surname" => filter_var($request->input('surname'), FILTER_SANITIZE_SPECIAL_CHARS),
            "email" => filter_var($request->input('email'), FILTER_SANITIZE_SPECIAL_CHARS),
            "password" => Hash::make(filter_var($request->input('password'), FILTER_SANITIZE_SPECIAL_CHARS)),

        ];

        DB::table('users')->insert([
            "firstname" => $data['firstname'],
            "surname" => $data['surname'],
            "email" => $data['email'],
            "password" => $data['password']
        ]);

        return redirect('/');
    }
}
