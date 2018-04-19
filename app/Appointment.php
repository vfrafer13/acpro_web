<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{


    public function dog()
    {
        return $this->belongsTo('App\Dog');
    }
}
