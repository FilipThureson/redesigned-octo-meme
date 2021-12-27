<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Mail\ForgotPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;



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
            "password" => $data['password'],
            "token" => bin2hex(random_bytes(30))
        ]);

        return redirect('/');
    }

    public function forgotPassword(Request $request){
        $email = filter_var($request->input('email'), FILTER_SANITIZE_SPECIAL_CHARS);
        $token = DB::table('users')->where('email', $email)->value('token');

        $details = [
            'title' => "Reset password!",
            'link' => "http://localhost:8000/reset/{$token}"
        ];
        //return $details['link'];
        Mail::to($email)->send(new ForgotPassword($details));
        return "Email Sent!";
    }
    public function resetPassword(Request $request){
        $token = $request->input('token');
        $password = Hash::make(filter_var($request->input('password'), FILTER_SANITIZE_SPECIAL_CHARS));
        if (!Hash::check($request->input('password_confirm'), $password))
        {
            return "password must match!";
        }

        DB::table('users')->where('token', $token)->update(['password' => $password, 'token' => bin2hex(random_bytes(30))]);

        //if(DB::table('users')->where('token', $token)){
        //    return "error!";
        //}
        return redirect('/login');
    }
}
