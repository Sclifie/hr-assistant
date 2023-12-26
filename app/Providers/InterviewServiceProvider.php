<?php

namespace App\Providers;

use App\Services\InterviewService\InterviewService;
use Illuminate\Support\ServiceProvider;

class InterviewServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('interview-service', function (){
            return new InterviewService();
        });
    }
    
    public function boot(): void
    {
    }
}