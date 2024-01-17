<?php

namespace App\Listeners;

use App\Events\InterviewPassedEvent;
use App\Mail\InterviewPassedMail;
use DragonCode\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendInterviewPassedMailListener implements ShouldQueue
{
    use InteractsWithQueue;
    
    public function handle(InterviewPassedEvent $event): void
    {
        $subject = __("interview.'Congrats! Interview passed'");
        $message = 'Очень большое и толстое письмо с поздравлениями';
        
        Mail::to($event->interview->email)->send(new InterviewPassedMail($subject, $message));
    }
}
