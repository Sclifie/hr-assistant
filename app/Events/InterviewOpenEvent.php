<?php

namespace App\Events;

use App\Models\Interview;
use App\Notifications\InterviewOpenNotification;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class InterviewOpenEvent
{
    use Dispatchable , SerializesModels;
    
    public function __construct(public Interview $interview)
    {}
}
