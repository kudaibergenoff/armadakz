<?php


namespace App\Mail;


use App\Models\Order;
use App\Models\Store;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $orders;
    public $user;
    public $store;

    public function __construct($order,$orders,User $user,Store $store)
    {
        $this->order = $order;
        $this->orders = $orders;
        $this->user = $user;
        $this->store = $store;
    }

    public function build()
    {
        return $this->subject("Новый заказ" )->view('emails.seller.newOrder');
    }
}
