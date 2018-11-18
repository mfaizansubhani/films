<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Films extends Model
{
    //
    public function comments()
    {
        return $this->hasMany('App\Commentss');
    }
}
