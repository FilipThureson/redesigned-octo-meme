<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PostsController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $caption = filter_var($request->input('title'), FILTER_SANITIZE_SPECIAL_CHARS);

        $imageName = bin2hex(random_bytes(10)). '.' .$request->image->extension();

        $request->image->move(public_path('img'), $imageName);

        DB::table('posts')->insert([
            'img' => $imageName,
            'user_id' => Session::get('user')[0]->id,
            'caption' => $caption
        ]);

        return redirect('/');
    }
    public function like($id)
    {
        $likes = DB::table('user-like')
            ->where('post_like_id', "=" ,  $id )
            ->where('user_like_id', "=" ,Session::get('user')[0]->id)
            ->get();
        if(count($likes) == 1){
            DB::table('user-like')
            ->where('post_like_id', "=" ,  $id )
            ->where('user_like_id', "=" ,Session::get('user')[0]->id)
            ->delete();
            DB::table('posts')->where('p_id', '=', $id)->update(['likes' => DB::raw('likes - 1')]);
            return ['status' =>"unlike", 'amount' => DB::table('posts')->where('p_id', '=', $id)->value('likes')];
        }else{
            DB::table('user-like')->insert([ 'post_like_id' => $id, 'user_like_id' => Session::get('user')[0]->id]);
            DB::table('posts')->where('p_id', '=', $id)->update(['likes' => DB::raw('likes + 1')]);
            return ['status' =>"like", 'amount' => DB::table('posts')->where('p_id', '=', $id)->value('likes')];
        }
    }
}
