<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VetHistory extends Model
{
    public function dog()
    {
        return $this->belongsTo('App\Dog');
    }
}
