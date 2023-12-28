<?php

namespace App\Listeners;

use App\Events\Employee\CreatedEvent;
use DragonCode\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EmployeeCreatedListener implements ShouldQueue
{
    use InteractsWithQueue;
    
    public function __construct(CreatedEvent $event)
    {}
    
    public function handle(CreatedEvent $event): void
    {
    
    }
}
