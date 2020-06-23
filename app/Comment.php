<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // Mass assign
    protected $fillable = [
        'post_id',
        'title',
        'body'
    ];

    /* DB relations */
    // User (many to one)
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
