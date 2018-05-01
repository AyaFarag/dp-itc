<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $primaryKey = 'post_id';

    protected $table = "posts";

    protected $fillable = [
        'content','fk_user_id'
    ];


    public function posts()
    {
        return $this->belongsTo('App\post');
    }
    
    public function comments()
    {
        return $this->hasMany('App\comment');
    }

    public function User()
    {
        return $this->belongsTo('App\User', 'fk_user_id');
    }
}
