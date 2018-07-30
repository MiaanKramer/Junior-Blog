<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Post extends Model
{
    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function scopeForUser($query, $user_id){
        return $query->where('user_id', $user_id);
    }

    public function scopeForCategory($query, $category_id){
        return $query->where('category_id', $category_id);
    }

    public function formatDate() {

        return Carbon::parse($this->created_at)->diffForHumans();
        
    }

    protected $fillable = ['title', 'body'];
    // Category??
}
