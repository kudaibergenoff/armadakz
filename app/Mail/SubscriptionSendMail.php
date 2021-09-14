<?php

namespace App\Mail;

use App\Models\Mailing;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscriptionSendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailing;

    public function __construct(Mailing $mailing)
    {
        $this->mailing = $mailing;
    }

    public function build()
    {
        return $this->subject($this->mailing->title)->view('emails.admin.subscriptionSendMail');
    }
}
