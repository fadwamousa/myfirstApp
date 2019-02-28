<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function post(){
    	return $this->belongsTo(Post::class);
    }

    public function user(){
    	return $thsi->belongsTo(User::class);
    }

    protected $fillable = ['comment','post_id','user_id'];
}
