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
        ->whereIn('posts.user_id',  $arr)
        ->orderByDesc('uploaded_at')
        ->get();
        $returnVal = [];
        foreach($posts as $post){

            $likes = DB::table('user-like')
            ->where('post_like_id', "=" ,  $post->p_id )
            ->where('user_like_id', "=" ,Session::get('user')[0]->id)
            ->get();

            if(count($likes) == 1){
                $isLiked = true;
            }else{
                $isLiked = false;
            }
            array_push($returnVal, ['post'=>$post, 'isLiked' => $isLiked]);

        }

        return $returnVal;
    }
}
