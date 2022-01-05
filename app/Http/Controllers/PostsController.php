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
}
