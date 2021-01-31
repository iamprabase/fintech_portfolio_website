<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $guarded = false;
    protected $table = 'aboutus';

    public function bullets()
    {
        return $this->hasMany('App\Bullet', 'section', 'section');
    }
}
