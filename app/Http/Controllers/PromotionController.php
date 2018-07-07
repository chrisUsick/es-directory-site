<?php

namespace App\Http\Controllers;
use App\Promotion;
use Hashids\Hashids;

class PromotionController extends BaseController
{
    public function Show($_city, $slug)
    {
        $promotion = Promotion::where('slug', $slug)->firstOrFail();
        
        return view('promotions.promotion', [
            'promotion' => $promotion
        ]);
    }

    public function GeneratePromoCode($id) 
    {
        $promotion = Promotion::find($id);
        $promoCode = $promotion->promoCodes()->create();
        $id = $promoCode->id;
        $hashids = new Hashids(env('HASHIDS_SALT'));
        $promoCode->code = $hashids->encode($id, 1,2);
        $promoCode->save();
        return response()->json($promoCode);
    }

}
