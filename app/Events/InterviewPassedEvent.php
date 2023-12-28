<?php

namespace App\Events;

use App\Models\Interview;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class InterviewPassedEvent
{
    use Dispatchable, SerializesModels;
    
    public Interview $interview;
    
    public function __construct(Interview $interview)
    {}
}
