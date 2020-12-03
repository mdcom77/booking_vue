<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['from', 'to'];
    
    public function bookable(){
        return $this->belongsTo('App\Bookable');
        //return $this->belongsTo(Bookable::class);
    }

    public function review(){
        return $this->hasOne('App\Review');
    }

    public function scopeBetweenDates(Builder $query, $from, $to){
        //call like $bookable->bookings()->betweenDates()
        return $query->where('to', '>=', $from)
            ->where('from', '<=', $to);
    }
}
