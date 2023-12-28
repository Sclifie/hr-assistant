<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InterviewPassedMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $message;
    
    public function __construct(string $subject, string $message)
    {
    }
    
    public function build(): self
    {
        return $this->view('emails.interview-passed');
    }
}
