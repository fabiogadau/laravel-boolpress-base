<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Mass assign
    protected $fillable = [
        'user_id',
        'title',
        'body',
        'slug'
    ];

    /* DB relations */
    // User (many to one)
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /* DB relations */
    // Posts (one to many)
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    // Tags (many to many)
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
