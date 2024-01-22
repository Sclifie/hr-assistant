<?php

namespace App\Listeners;
use App\Events\InterviewOpenEvent;
use App\Events\InterviewPassedEvent;
use App\Events\InterviewRejectedEvent;
use Illuminate\Events\Dispatcher;

class InterviewEventSubscriber
{
    public function subscribe(Dispatcher $events): void
    {
        $events->listen(
            InterviewPassedEvent::class,
            [InterviewEventSubscriber::class, 'handlePassed']
        );
        
        $events->listen(
            InterviewOpenEvent::class,
            [InterviewEventSubscriber::class, 'handleOpen']
        );
        
        $events->listen(
            InterviewRejectedEvent::class,
            [InterviewEventSubscriber::class, 'handleRejected']
        );
    }
    
    public function handlePassed(InterviewPassedEvent $event)
    {
//        dump($event->interview, 'passed');
    }
    
    public function handleOpen(InterviewOpenEvent $event)
    {
//        dump($event->interview, 'open');
    }
    
    public function handleRejected(InterviewRejectedEvent $event)
    {
//        dump($event, 'rejected');
    }
}