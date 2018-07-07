<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = [
        'name', 'description', 'maxCodes', 'begins', 'ends'
    ];
    protected $dates = [
        'begins', 'ends'
    ];
    public function city() {
        return $this->belongsTo('App\City');
    }

    public function company() {
        return $this->belongsTo('App\Company');
    }

    public function promoCodes() {
        return $this->hasMany('App\PromoCode');
    }
}
