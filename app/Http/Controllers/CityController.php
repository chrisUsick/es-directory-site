<?php

namespace App\Http\Controllers;
use App\City;

class CityController extends BaseController
{
    public function Show($slug)
    {
        //All variable will be available in views
        $city = City::where('slug', $slug)->firstOrFail();
        return view('cities.city', ['city' => $city]);
    }

}
