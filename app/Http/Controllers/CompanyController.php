<?php

namespace App\Http\Controllers;
use App\Company;

class CompanyController extends BaseController
{
    public function Show($citySlug, $companySlug)
    {
        //All variable will be available in views
        $company = Company::where('slug', $companySlug)->firstOrFail();
        $rooms = $company->rooms;
        $city = $company->cities()->where('slug', $citySlug)->firstOrFail();
        
        return view('companies.company', [
            'city' => $city, 
            'company' => $company,
            'rooms' => $rooms
        ]);
    }

}
