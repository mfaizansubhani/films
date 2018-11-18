<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentss extends Model
{
    public function post()
    {
        return $this->belongsTo('App\Films');
    }
}
