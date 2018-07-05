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
}
