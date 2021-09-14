<?php

namespace App\Mail;

use App\Models\Store;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EditStore extends Mailable
{
    use Queueable, SerializesModels;

    public $store;

    public function __construct(Store $store)
    {
        $this->store = $store;
    }

    public function build()
    {
        return $this->subject("В магазин " . $this->store->title . " были внесены изменения" )->view('emails.admin.editStore');
    }
}
