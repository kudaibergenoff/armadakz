<?php


namespace App\Mail;


use App\Models\Review;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AddComment extends Mailable
{
    use Queueable, SerializesModels;

    public $review;

    public function __construct(Review $review)
    {
        $this->review = $review;
    }

    public function build()
    {
        return $this->subject("Добавлен новый отзыв" )->view('emails.admin.newComment');
    }
}
