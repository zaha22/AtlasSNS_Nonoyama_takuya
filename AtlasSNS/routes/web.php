<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');



//ログイン中のページ
Route::group(['middleware' => 'auth'], function() {
  Route::get('/top','PostsController@index');
});

//ログアウト機能
Route::get('/logout','Auth\LoginController@logout');

//プロフィール画面の表示
Route::get('/profile','UsersController@profile');
//アイコン画像表示
Route::get('/profile/update','UsersController@show');
//プロフィール画像の更新機能
//Route::get('/profile','UsersController@profileupdate');



//他ユーザーのプロフィール
Route::get('/otherprofile/{id}','FollowsController@followed_profile');

//他ユーザーのフォロー機能の作成
Route::get('/otherfollow/{id}','FollowsController@otherfollow');
//他ユーザーのフォロー解除機能
Route::get('/otherfollowdelete/{id}','FollowsController@otherfollowdelete');
//フォローしているユーザーの投稿一覧表示
//Route::get('/otherprofile/{id}','FollowsController@followposts');


//検索したワードを表示
Route::post('/search','UsersController@usersearch');

//一覧表示
Route::get('/search','UsersController@search');

//フォローリストの表示
Route::get('/follow-list','PostsController@followList');
Route::get('/follower-list','PostsController@followerList');

//フォロー機能
Route::get('users/{id}/follow', 'FollowsController@follow');
Route::get('users/{user}/unfollow', 'FollowSController@unfollow');


//投稿用
Route::post('post/create','PostsController@post');

//投稿の削除
Route::get('post/{id}/delete','PostsController@delete');

//投稿の編集
Route::get('post/{id}/update','PostsController@update');
