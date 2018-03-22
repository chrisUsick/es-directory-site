<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 'description', 'image'
    ];
    public function cities() {
        return $this->belongsToMany('App\City', 'city_company')
            ->withTimestamps();
    }

    public function rooms() {
        return $this->hasMany('App\Room');
    }
}
