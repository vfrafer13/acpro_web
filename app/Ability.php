<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{


    public function dogs()
    {
        return $this->belongsToMany('App\Dog');
    }
}
