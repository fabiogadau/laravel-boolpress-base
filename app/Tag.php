<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /* DB relations */
    // Posts (many to many)
    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }
}
