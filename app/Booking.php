<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $fillable = [
        'user_id', 'docs_path'
    ];
    
    // Details here
    public function stand() {
        return $this->belongsTo('App\Stand');
    }

    // Details here
    public function user() {
        return $this->belongsTo('App\User');
    }
}
