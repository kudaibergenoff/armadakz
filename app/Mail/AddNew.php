<?php


namespace App\Mail;


use App\Models\News;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AddNew extends Mailable
{
    use Queueable, SerializesModels;

    public $new;

    public function __construct(News $new)
    {
        $this->new = $new;
    }

    public function build()
    {
        return $this->subject("Создана новая публикация" )->view('emails.admin.addNew');
    }
}
