<?php

namespace App\Http\Controllers;
use App\City;
use App\Company;

class CityController extends BaseController
{
    public function Show($slug)
    {
        //All variable will be available in views
        $city = City::where('slug', $slug)->firstOrFail();
        $companies = $city->companies()->withCount('rooms')->get();
        $rooms = $city->rooms;
        
        return view('cities.city', [
            'city' => $city, 
            'companies' => $companies,
            'rooms' => $rooms
        ]);
    }

}
