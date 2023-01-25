<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\follow;


class PostsController extends Controller
{
    //フォローしているユーザーを表示する設定をする
    public function followList(){
        $all_users = User::get();
        // フォローしているユーザーのidを取得↓
        $following_id = Auth::User()->follows()->pluck('followed_id');
        //dd($following_id);
        // フォローしているユーザーのidを元に投稿内容を取得
        $follow_post = Post::with('user')->whereIn('user_id', $following_id)->get();
        //dd($follow_post);
        //全userのアイコン画像を取得
        $allfollowusericon = User::get();
        //dd($allfollowusericon);
        return view('follows.followList',['follow_post'=>$follow_post,'allfollowusericon'=>$allfollowusericon]);
    }


    //フォローされているユーザーの表示
    public function followerList(){
        $all_users2 = User::get();
        $followed_id = Auth::User()->followUsers()->pluck('following_id');
        //dd($followed_id);
        //フォローしているユーザーのつぶやきを表示する
        $follow_post = Post::with('user')->whereIn('user_id', $followed_id)->get();
        //dd($follow_post);
        $allfollowerusericon = User::get();
        //dd($allfollowerusericon);

        return view('follows.followerList',['followed_id'=>$follow_post,'allfollowerusericon'=>$allfollowerusericon]);
    }

    //フォロー機能
    public function follow(){
        return back();
    }

    public function index(){
        //$post2=Auth::user();
        //dd($post2);
        $post = Post::query()
        ->whereIn('user_id', Auth::user()->follows()
        ->pluck('followed_id'))
        ->orWhere('user_id',  Auth::user()->id)
        //->whereIn('user_id', Auth::user()->follows()->pluck('following_id'))
        ->latest()
        ->get();
        //$post=Auth::user();
        //dd($post);


        return view('posts.index',['post'=>$post]);
    }

//投稿機能
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

//削除機能
    public function delete($id)
    {//dd($id);
        \DB::table('posts')
            ->where('id', $id)
            ->delete();

            return redirect('/top');

    }

//編集機能
   public function update(Request $request){
        //dd($request);
        $post = $request->input('post');
        $id = $request->input('id');
        //dd($id);
        \DB::table('posts')
            ->where('id', $id)
            ->update([
            'post' =>$post
        ]);

            return redirect('/top');

    }



}
