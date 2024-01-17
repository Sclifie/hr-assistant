<?php

namespace App\Events;

use App\Models\Interview;
use App\Notifications\InterviewOpenNotification;
use Illuminate\Foundation\Events\Dispatchable;

class InterviewOpenEvent
{
    use Dispatchable;
    
    public Interview $interview;
    
    public function __construct(Interview $interview)
    {
    }
    
    public function toMail($notifiable)
    {
        return new InterviewOpenNotification($this->interview);
    }
    
    public function handle()
    {
        // Сообщение вида Привет fio, тебе назначено интервью на время.
    }
}
