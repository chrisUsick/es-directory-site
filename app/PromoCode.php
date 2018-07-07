<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    protected $fillable = [
        'code'
    ];

    public function promotion() {
        return $this->belongsTo('App\Promotion');
    }

}
