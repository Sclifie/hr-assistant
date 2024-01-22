<?php

namespace App\Mail;

use App\Models\Interview;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InterviewPassedMailToEmployee extends Mailable
{
    use Queueable, SerializesModels;
    
    public function __construct(protected Interview $interview)
    {
    }
    
    public function envelope(): Envelope
    {
        return new Envelope(
            to: $this->interview->email,
            subject: 'Поздравляем с успешным прохождением интервью',
            tags: ['interview'],
        );
    }
    
    public function content(): Content
    {
        $message = 'Большое письмо с поздравлениями';
        
        return new Content(
            view: 'emails.interview-passed',
            with: [
                'message' => $message,
            ],
        );
    }
}
