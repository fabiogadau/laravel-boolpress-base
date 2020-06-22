<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoUser extends Model
{
    // Mass assign
    protected $fillable = [
        'user_id',
        'phone',
        'address',
        'avatar'
    ];

    // Remove timestamp
    public $timestamps = false;

    /* DB relations */
    // InfoUser (one to one)
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
