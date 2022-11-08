<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use delete;
class PostsController extends Controller
{
    //
    public function index(){
        $post=\DB::table('posts')->get();
        //dd($post);
        return view('posts.index',['post'=>$post]);

    }

    public function post(Request $request)
    {
        //dd($request);
        $post = $request->input('newPost');
        $user_id = Auth::user()->id;
        //dd($user_id);

        \DB::table('posts')->insert([
            'post' => $post,
            'user_id' => $user_id
        ]);

        return redirect('/top');
    }


    public function delete(Request $request)
    {
        $post = $request->input('newPost');
        $user_id = Auth::user()->id;
        \DB::table('posts')->delete([
            'post' => $post,
            'user_id' => $user_id
        ]);


        return redirect('/top');
    }


    public function update(Request $request)
    {
        $post = $request->input('newPost');
        $user_id = Auth::user()->id;
        //dd($post);
        \DB::table('posts')->update([
            'post' => $post,
            'user_id' => $user_id
        ]);

        return redirect('/top');
    }






}
