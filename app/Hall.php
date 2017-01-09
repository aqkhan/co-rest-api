<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    //
    protected $fillable = [
        'name', 'description'
    ];
    
    // Details here
    public function event() {
        return $this->belongsTo('App\Event');
    }
    
    // Details here
    public function stands() {
        return $this->hasMany('App\Stand');
    }
}
