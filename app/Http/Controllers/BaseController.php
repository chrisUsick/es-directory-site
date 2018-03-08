<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use View;

class BaseController extends Controller
{
    public function __construct() {
        $global = [
            'title' => 'Title'
        ];
        View::share ( 'global', $global );
        
     }  
}
