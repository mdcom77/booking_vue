<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    public $incrementing = false;

    // public function getKeyType()
    // {
    //     return 'string';
    // }

    public function bookable(){
        //return $this->belongsTo(Bookable::class);
        return $this->belongsTo('App\Bookable');
    }

    public function booking(){
        //return $this->belongsTo(Booking::class);
        return $this->belongsTo('App\Booking');
    }
}
