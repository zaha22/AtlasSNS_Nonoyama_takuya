<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Post;
use App\Follow;
use Auth;
use update;


class UsersController extends Controller
{
    //ログインユーザーのプロフィール内容
    //public function profile(Request $request){
    //    $profilename =  \DB::table('users')->get('username');
    //    //dd($profilename);
    //    return view('users.profile')->with(['profilename' => $profilename,]);
    //}

    public function profile() {

        $userimage = Auth::user()->images;
        //dd($userimage);

        return view('users.profile',['userimage' => $userimage]);
    }

    public function show(Request $request) {
        //$user = Auth::user();
        //dd($user);
        $id = Auth::user()->id;
        $username = $request->input('username');
        $usermail = $request->input('mailadress');
        $userbio = $request->input('bio');
        //$password = $request->input('password');
        //dd($username);
        \DB::table('users')
             ->where('id', $id)
             ->update([
                'username' =>$username,
                'mail' => $usermail,
                'bio'  => $userbio,
                //'password' => bcrypt($password)
            ]);

        return redirect('/top');


    }
    //登録ユーザーの表示　get()はすべてのデータとの意味
    public function search(){
        $users = \DB::table('users')
        ->get();
        $keywordsearch = "";
        return view('users.search',['users'=>$users,'keywordsearch' => $keywordsearch]);
    }

    //検索したワードを表示
    public function usersearch (Request $request){
        //$users = \DB::table('users')->get();
        $keywordsearch = $request->input('search');

        //dd($keywordsearch);
        //dd($users);
        if(!empty($keywordsearch)) {
            $query = User::query();
            $users = $query->where('username','like','%' .$keywordsearch. '%')->get();
        }
            return view('users.search')->with([
                'users' => $users,
                'keywordsearch' => $keywordsearch,
            ]);
}
}
