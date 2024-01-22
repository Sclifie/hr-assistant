<?php

namespace App\Mail;

use App\Models\Employee;
use App\Models\Interview;
use App\Models\Position;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InterviewPassedMailToCEO extends Mailable
{
    use Queueable, SerializesModels;
    
    public function __construct(protected Interview $interview)
    {}
    
    public function envelope(): Envelope
    {
        return new Envelope(
            to: config('mail.to.address'),
            subject: 'Новый кандидат прошёл интервью',
            tags: ['interview','employee'],
        );
    }
    
    public function content(): Content
    {
        $message = 'Большой отчёт об интервью';
        
        return new Content(
            view: 'emails.interview-passed-ceo',
            with: [
                'interview' => $this->interview,
                'message' => $message,
            ],
        );
    }
}
