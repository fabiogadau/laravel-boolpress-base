<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Mass assign
    protected $fillable = [
        'user_id',
        'title',
        'body'
    ];

    /* DB relations */
    // User (many to one)
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
