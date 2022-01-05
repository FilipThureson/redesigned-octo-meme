<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class FeedController extends Controller
{
    public function index()
    {

        $follows =  DB::table('user-follow')->where('user_id', Session::get('user')[0]->id)->get();
        $arr = [];
        for ($i=0; $i < count($follows); $i++) {

            array_push($arr, $follows[$i]->follow_id);
        }
        $posts = DB::table('posts')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->whereIn('user_id',  $arr)
        ->orderByDesc('uploaded_at')
        ->get();
        return $posts;
        //return Session::get('user')[0];
    }
}
