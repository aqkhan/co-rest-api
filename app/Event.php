<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = [
        'name', 'type', 'location', 'date', 'hall_id'
    ];

    public function halls() {
        return $this->hasOne('App\Hall');
    }
}
