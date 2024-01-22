<?php

namespace App\Providers;

use App\Events\Employee\CreatedEvent;
use App\Events\InterviewOpenEvent;
use App\Events\InterviewPassedEvent;
use App\Listeners\EmployeeCreatedListener;
use App\Listeners\InterviewEventSubscriber;
use App\Listeners\SendEmailsOnInterviewOpenListener;
use App\Listeners\SendInterviewPassedMailListener;
use App\Services\InterviewService\InterviewRejected;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        CreatedEvent::class => [
            EmployeeCreatedListener::class,
        ],
    ];
    
    protected $subscribe = [
        InterviewEventSubscriber::class
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
