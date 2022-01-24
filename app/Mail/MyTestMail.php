<?php

namespace App\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class MyTestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
  

    public function __construct($details)
    {
        $this->details = $details;
    }
  
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('E-mail from MamiKos')
                    ->view('emails.myTestMail');
    }
}