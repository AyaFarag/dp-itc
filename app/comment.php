<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $primaryKey = 'comment_id';

    protected $table = "comments";

    protected $fillable = [
        'content'
    ];


    public function comments()
    {
        return $this->belongsTo('App\comment');
    }
    
    public function posts()
    {
        return $this->belongsTo('App\post', 'fk_post_id');
    }

    public function User()
    {
        return $this->belongsTo('App\User' ,'fk_user_id');
    }
}
