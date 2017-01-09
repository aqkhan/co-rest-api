<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stand extends Model
{
    //
    protected $fillable = [
        'name', 'hall_id', 'booking_id', 'thumbnail'
    ];
    
    // Details here
    public function hall() {
        return $this->belongsTo('App\Hall');
    }

    // Details here
    public function booking() {
        return $this->hasOne('App\Booking');
    }
}
