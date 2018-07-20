<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function posts() {
        return $this->hasMany('App\Post');
    }

    public function scopeForUser($query, $user_id){
        return $query->where('user_id', $user_id);
    }

    public function scopeForCategory($query, $post_id){
        return $query->where('post_id', $post_id);
    }

    protected $fillabel = ['title', 'description'];

}
