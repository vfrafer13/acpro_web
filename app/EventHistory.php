<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventHistory extends Model
{
    public function dog()
    {
        return $this->belongsTo('App\Dog');
    }

    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}
