<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //

    public function dogs()
    {
        return $this->belongsToMany('App\Dog');
    }

    public function eventHistoryEntries()
    {
        return $this->hasMany('App\EventHistory');
    }

    public function getFullNameAttribute()
    {
        return $this->name . ' (' . date('d-m-Y', strtotime($this->date))  . ')';
    }
}
