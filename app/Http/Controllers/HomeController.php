<?php

namespace App\Http\Controllers;
use App\City;

class HomeController extends BaseController
{
    public function Index()
    {
        //All variable will be available in views
        $cities = City::all();
        return view('welcome', ['cities' => $cities]);
    }

}
