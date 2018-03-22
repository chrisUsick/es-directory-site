<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'image',
        'bookingLink', 'address', 'difficulty'
    ];

    public function city() {
        return $this->belongsTo('App\City');
    }

    public function company() {
        return $this->belongsTo('App\Company');
    }
}
