<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\City;
use App\Company;
use App\Room;
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
        $city->enabled = true;
        $city->slug = 'winnipeg';
        $city->save();

        $company = new Company();
        $company->name = "Engima Escapes";
        $company->description = 'A live escape game.';
        $company->image = 'http://www.enigmaescapes.com/images/compass-for-wall-u44410.png?crc=236295687';
        $company->slug = 'engima-escapes';
        $company->save();
        $city->companies()->save($company);

        $room = new Room();
        $room->name = 'THE LOST JEWEL OF ZANZIBAR';
        $room->description = 'It is 1930. You have received a mysterious postcard from your colleague, Magnus Ferguson, who has been exploring throughout Africa. He has hidden a mystical gem from a powerful warlord. Can you find the jewel before the warlord and his army come to claim it?';
        $room->difficulty = 3;
        $room->image = 'http://www.enigmaescapes.com/images/zanzibar%20web%20room%20pic.jpg?crc=3994551667';
        $room->bookingLink = 'http://www.enigmaescapes.com/#rooms';
        $room->address = 'Unit 4 - 980 Lorimer Blvd.';
        $room->company()->associate($company);
        $room->city()->associate($city);
        $room->save();
    }
}
