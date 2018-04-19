<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    //

    public function events()
    {
        return $this->belongsToMany('App\Event');
    }

    public function abilities()
    {
        return $this->belongsToMany('App\Ability');
    }

    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }

    public function vetHistoryEntries()
    {
        return $this->hasMany('App\VetHistory');
    }

    public function eventHistoryEntries()
    {
        return $this->hasMany('App\EventHistory');
    }

    public function getFullNameAttribute()
    {
        return $this->name . ' - ' . $this->owner;
    }
}
