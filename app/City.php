<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Phaza\LaravelPostgis\Eloquent\PostgisTrait;
use Phaza\LaravelPostgis\Geometries\Point;

class City extends Model
{
    use PostgisTrait;
    protected $fillable = [
        'name', 'description'
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
}
