<?php

namespace App\Events;

use App\Models\Interview;
use Illuminate\Contracts\Events\ShouldDispatchAfterCommit;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class InterviewRejectedEvent implements ShouldDispatchAfterCommit
{
    use Dispatchable, SerializesModels;
    
    public function __construct(public Interview $interview)
    {}
}
