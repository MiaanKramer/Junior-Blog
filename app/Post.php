<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function scopeForUser($query, $user_id){
        return $query->where('user_id', $user_id);
    }

    public function scopeForCategory($query, $category_id){
        return $query->where('category_id', $category_id);
    }

    protected $fillabel = ['title', 'body'];
    // Category??
}
