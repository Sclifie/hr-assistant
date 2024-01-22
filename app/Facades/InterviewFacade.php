<?php

namespace App\Facades;

use App\Services\InterviewService\InterviewService;
use Illuminate\Support\Facades\Facade;

class InterviewFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'app-interview-service';
    }
}