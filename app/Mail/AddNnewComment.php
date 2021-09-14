<?php


namespace App\Mail;


use App\Models\NewsComment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AddNnewComment extends Mailable
{
    use Queueable, SerializesModels;

    public $review;

    public function __construct(NewsComment $review)
    {
        $this->review = $review;
    }

    public function build()
    {
        return $this->subject("Добавлен новый отзыв" )->view('emails.admin.addNewComment');
    }
}
