<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Promotion;
use App\PromoCode;

class PromoCodeController extends Controller
{
    use ModelForm;

    public function Index() 
    {
        return Admin::content(function (Content $content) {
            $content->header('Validate promo code');
            $content->description('Scan the QR code or enter the ');
        });
    }
}
