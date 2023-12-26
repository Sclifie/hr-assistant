<?php

namespace App\Services\InterviewService;

use App\Interfaces\Logged;

abstract class InterviewServiceAbstract implements InterviewServiceInterface
{
    protected static function log(string $message, string $level): void
    {
        \Log::$level('Model Interview not created : ' . $message);
    }
}