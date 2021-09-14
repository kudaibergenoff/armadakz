<?php

namespace App\Mail;

use App\Models\Store;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewApplication extends Mailable
{
    use Queueable, SerializesModels;

    public $store;

    public function __construct(Store $store)
    {
        $this->store = $store;
    }

    public function build()
    {
        return $this->subject("Новая заявка" )->view('emails.admin.newApplication');
    }
}
