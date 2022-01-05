<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function index($id)
    {

        $isFollowing = false;

        if(count(DB::table('user-follow')->where('follow_id', $id)->where('user_id', Session::get('user')[0]->id)->get())==1){
            $isFollowing = true;
        }
        $posts = DB::table('posts')->where('user_id', $id)->get();
        $data = [
            'user' => DB::table('users')->where('id', $id)->get(),
            'posts' => $posts,
            'amountOfFollowers' => count(DB::table('user-follow')->where('follow_id', $id)->get()),
            'amountOfFollowing' => count(DB::table('user-follow')->where('user_id', $id)->get()),
            'amountOfPosts' => count($posts),
            'isFollowing' => $isFollowing
        ];
        return $data;
    }

    public function follow($id){
        if($id == Session::get('user')[0]->id) return abort(403);
        if(count(DB::table('user-follow')->where('follow_id', $id)->where('user_id', Session::get('user')[0]->id)->get())==1){

            DB::table('user-follow')->where('follow_id', $id)->where('user_id', Session::get('user')[0]->id)->delete();
            return [
                'amountOfFollowers' => count(DB::table('user-follow')->where('follow_id', $id)->get()),
                'isFollowing' => false
            ];
        }else{
            DB::table('user-follow')->insert([
                'user_id' => Session::get('user')[0]->id,
                'follow_id' => $id
            ]);
            return [
                'amountOfFollowers' => count(DB::table('user-follow')->where('follow_id', $id)->get()),
                'isFollowing' => true
            ];
        }

    }
}
