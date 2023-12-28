<?php

namespace App\Services\InterviewService;

use App\Models\Interview;

abstract class InterviewServiceAbstract implements InterviewServiceInterface
{
    public function createInterview(array $interviewData): \Exception|Interview
    {
        return Interview::firstOrCreate($interviewData);
    }
    
    public function updateInterview(array $interviewData): Interview
    {
        $interview = $this->createInterview($interviewData);
        $interview->update($interviewData);
        return $interview->refresh();
    }
    
    protected static function log(string $message = 'Interview service called', string $level = 'info'): void
    {
        \Log::$level($message . ' in ' . __CLASS__);
    }
}