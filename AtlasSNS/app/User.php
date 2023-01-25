<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //リレーション定義
    public function posts()
{
    return $this->hasMany('App\Post');
}

    public function follows(){
        //return $this->middleware('auth');
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'followed_id');
    }

    public function followUsers(){
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'following_id');
    }

    // フォローしているか
    public function isfollowing($user_id)
    {
        //dd($user_id);
        return (boolean) $this->follows()->where('followed_id', $user_id)->first();
    }

    //フォローされているか
    public function isfollowed($user_id)
    {
        return (boolean) $this->follows()->where('following_id', $user_id)->first();
    }
}
