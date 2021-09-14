<?php

namespace App\Traits;

use App\LiqPay;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

trait InfoPayment
{
    public function infoPayment()
    {
        $document_id = $this->id;
        $document_price = 50;


        $public_key = "i70534093525";
        $private_key = "2xythBaYIoUH8GFqChbbfRkePZ16f6MVzY908TAJ";
        $title = $this->title;
        $description = $this->description;

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
            'product_name' => "$description"
        ));
        return $html;
    }
}
