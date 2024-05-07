<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewScheduleMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user_request;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_request)
    {
        $this->user_request = $user_request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('frontend.emailform')->subject('Новое сообщение обратной связи '.substr(env('APP_URL'),8));
    }
}
