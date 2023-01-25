<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\follow;
use Auth;
use App\Post;

class FollowsController extends Controller
{
    //
    public function followList(){

        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }

    // public function follow(User $user,$id){
    //     //dd($id);
    //     $user = User::find($id);
    //     $follow = auth()->user();
    //     //dd($follow);
    //     $is_following = $follow->isfollowing($user->id);
    //     //dd($is_following);
    //     if($is_following) {
    //         $follow->follow($user->id);
    //     }
    //     return back();
    // }

    //フォローテーブルへの追加
    public function follow($id){
        //dd($id);
        $following = Auth::user()->id;
        //dd($following);
         \DB::table('follows')->insert([
            'followed_id' => $id,
            'following_id' => $following
        ]);
        return back();
    }

    //フォローテーブルへの削除
    public function unfollow($id) {
        //dd($id);
        $unfollowing = Auth::user()->id;
        //dd($unfollowing);

         \DB::table('follows')
            ->where('followed_id', $id)
            ->where('following_id', $unfollowing)
            ->delete();

        return back();
    }

    //他ユーザーのプロフィール
    public function followed_profile($id){
        //dd($id);
        //$user_id = User::find($id);
        //dd($user_id);
        //$user_id = \DB::table('users')->first();
        $user_name = \DB::table('users')
        ->where('id' , $id)
        ->first();
        //ddd($user_name);
        //dd($user_name);
        //他ユーザーのつぶやき一覧
         $followlist = Auth::user()->follows()->get();
         //dd($followlist);
         $followpostlist = \DB::table('posts')
        ->where('user_id', $id)
        ->get();
        //dd($followpostlist);

        return view('users.otherprofile', ['user_name' => $user_name,'followpostlist' => $followpostlist]);
    }


    //他ユーザーのフォロー機能
    public function otherfollow($id) {
        //dd($id);
        $otherfollowing = Auth::user()->id;
        //dd($otherfollowing);

         \DB::table('follows')->insert([
            'followed_id' => $id,
            'following_id' =>$otherfollowing
        ]);

        return back();
    }

    //他ユーザーのフォロー解除機能
    public function otherfollowdelete($id) {
        //dd($id);
        $otherfollowed = Auth::user()->id;
        //dd($otherfollowed);

        \DB::table('follows')
            ->where('followed_id', $id)
            ->where('following_id', $otherfollowed)
            ->delete();

        return back();
    }



}
