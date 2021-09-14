<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Tarif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Paybox\Pay\Facade as Paybox;
use SimpleXMLElement;

class PayController extends Controller
{
    public function payStore($tarif)
    {
        $tarif = Tarif::findOrFail($tarif);
        $paybox = new Paybox();

        $paybox->merchant->id = 540629;
        $paybox->merchant->secretKey = '3le80mV4EnGLaIRC';
        $paybox->order->id = 10001;
        $paybox->order->store_id = 12;
        $paybox->order->description = 'test order';
        $paybox->order->amount = $tarif->placement_price;
        $paybox->customer->user_phone = 77775556664;
        $paybox->customer->salt = 'test';
        $paybox->customer->userEmail = 'admin@admin.kz';

        $paybox->config->successUrlMethod = 'GET';
        $paybox->config->resultUrl = 'https://market.armada.kz/api/pay/result';
        $paybox->config->successUrl = 'https://market.armada.kz/pay/success';

        if($paybox->init()) {
            file_put_contents('file.txt', $paybox );
            header('Location:' . $paybox->redirectUrl);
            //dd($paybox);
        }

        // $url = 'https://api.paybox.money/init_payment.php';

        // $request = $requestForsign = [
        //     'pg_order_id'    => '10001',
        //     'pg_merchant_id' => 540629,
        //     'pg_user_phone'  => '77775556633',
        //     'pg_amount'      => $tarif->placement_price,
        //     'pg_description' => 'Тестовый платеж',
        //     'pg_salt'        => 'gogo'
        // ];

        // $requestForSignature = $this->makeFlatParamsArray($requestForsign);

        // ksort($requestForSignature); // Сортировка по ключю
        // array_unshift($requestForSignature, 'init_payment.php'); // Добавление в начало имени скрипта
        // array_push($requestForSignature, '3le80mV4EnGLaIRC'); // Добавление в конец секретного ключа

        // $request['pg_sig'] = md5(implode(';', $requestForSignature)); // Полученная подпись
        // $response = Http::post($url, $request);
        // return (new SimpleXMLElement($response));

    }

    function makeFlatParamsArray($arrParams, $parent_name = '')
    {
        $arrFlatParams = [];
        $i = 0;
        foreach ($arrParams as $key => $val) {
            $i++;
            /**
             * Имя делаем вида tag001subtag001
             * Чтобы можно было потом нормально отсортировать и вложенные узлы не запутались при сортировке
             */
            $name = $parent_name . $key . sprintf('%03d', $i);
            if (is_array($val)) {
                $arrFlatParams = array_merge($arrFlatParams, makeFlatParamsArray($val, $name));
                continue;
            }
            $arrFlatParams += array($name => (string)$val);
        }

        return $arrFlatParams;
    }

    public function pay()
    {
        return view('sellers.pay');
    }
}
