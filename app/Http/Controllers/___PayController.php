<?php

namespace App\Http\Controllers;

use App\Document;
use App\Download;
use App\Participant;
use App\Pay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use LiqPay;

class PayController extends Controller
{
    public function index(Request $request)
    {
//        $s = implode('|', $request->post());
        $private_key = "2xythBaYIoUH8GFqChbbfRkePZ16f6MVzY908TAJ";
        $data = $_POST;
        file_put_contents('file.txt', $data );
        $data = $data['data'];
        //$data = json_decode($data);
        //$data = json_decode( base64_decode($request->json('data')) );
        $data = base64_decode($data);
        $data = json_decode($data, true);
        //   $data = $data['action']. '|' .$data['payment_id'];
        //$data = json_encode($data);
        //$data = $data['data'];
//        $sign = base64_encode( sha1(
//            $private_key .
//            $data .
//            $private_key
//            , 1 ));
        //if($sign ==$dsds[] )
        file_put_contents('file.txt', $data );

        $pay = new Pay();
        $pay->fill($data);
        $doc_id = $data['info'];
        $pay->document_id = $doc_id;
//        $eid = $data['product_name'];
//        $pay->event_id = $eid;
        $user_id = $data['customer'];
        $pay->user_id = $user_id;
        $autor_id = $data['product_name'];
        $pay->autor_id = $autor_id;
        $pay->save();
        $pay_id = $pay->id;
        if($pay->status == 'wait_accept'){ //success

            $download = new Download();
            $download->document_id = $doc_id;
            $download->user_id = $user_id;
            $download->pay_id = $pay_id;
            $download->save();
//            $download = new static;
//            $download->document_id = $pid;
//            $download->user_id = $uid;
//            $download->pay_id = $pay_id;
//            //dd(123);
//            $download->save();
        }
    }

    public function payOk()
    {
        dd($_POST,$_GET);
        return redirect()->route('user.download')->with('success','Оплату здійснено');
    }
}
