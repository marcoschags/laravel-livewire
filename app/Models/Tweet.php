<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $filable = [
        'content'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}


