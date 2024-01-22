<?php

namespace App\Providers;

use App\Facades\InterviewFacade;
use App\Models\Interview;
use App\Services\InterviewService\InterviewService;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class InterviewServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('app-interview-service', function (){
            return new InterviewService();
        });
    }
    
    public function boot(): void
    {
    
    }
}
