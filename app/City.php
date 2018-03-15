<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Phaza\LaravelPostgis\Eloquent\PostgisTrait;
use Phaza\LaravelPostgis\Geometries\Point;

class City extends Model
{
    use PostgisTrait;
    protected $fillable = [
        'name', 'description', 'slug', 'enabled'
    ];
    protected $postgisFields = [
        'location'
    ];
    protected $postgisTypes = [
        'location' => [
            'geomtype' => 'geography',
            'srid' => 4326
        ]
    ];

    public function companies() {
        return $this->belongsToMany('App\Company')
            ->withTimestamps();
    }
}
