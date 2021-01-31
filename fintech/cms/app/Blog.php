<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = false;

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
