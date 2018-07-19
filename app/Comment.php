<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    // protected $with = ['user'];

    // Setting up Relationships
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function post() {
        return $this->belongsTo(Post::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    } 

    //Posting settings to set all data to entry without havinf to set each individually

    protected $fillable = ['content'];


}
