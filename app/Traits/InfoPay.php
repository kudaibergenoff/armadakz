<?php

namespace App\Traits;

use App\LiqPay;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

trait InfoPay
{
    public function infoPay()
    {
        $document_id = $this->id;
        $document_price = 1;


        $public_key = "i70534093525";
        $private_key = "2xythBaYIoUH8GFqChbbfRkePZ16f6MVzY908TAJ";
        $title = $this->title;
        $autor_id = $this->user_id;

        $user_id = Auth::id();

        $rnd = Str::random(10);
        $liqpay = new LiqPay($public_key, $private_key);
        $html = $liqpay->cnb_form(array(
            'action' => 'pay',
            'amount' => "$document_price",
            'currency' => "UAH",
            'language' => "uk",
            'description' => "$title",
            'order_id' => "$rnd",
            'version' => '3',
            'info' => "$document_id",
            'customer' => "$user_id",
            'product_name' => "$autor_id"
        ));
//dd($liqpay, $html);
        return $html;
    }
}
