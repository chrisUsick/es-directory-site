<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\City;
use Phaza\LaravelPostgis\Geometries\Point;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $name = 'Winnipeg';
        $description = 'Home of Escape Room World';
        $location = 'ST_SetSRID(ST_MakePoint(49, 51), 4326)';

        $city = new City();
        $city->name = $name;
        $city->description = $description;
        $city->location = new Point(49,51);
        $city->save();
    }
}
