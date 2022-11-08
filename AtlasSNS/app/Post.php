<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Notifiable;

     protected $fillable = [
        'user_id', 'post',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
