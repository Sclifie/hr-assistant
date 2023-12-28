<?php

namespace App\Services\InterviewService;

use App\Models\Interview;

class InterviewRejected extends InterviewServiceAbstract implements InterviewServiceInterface
{
    public function createInterview($interviewData): \DomainException|Interview
    {
        static::log('Interview Rejected Created at ' . __CLASS__, 'info');
        return Interview::create($interviewData);
    }
    
    public function updateInterview(array $interviewData): Interview
    {
        // TODO: Implement updateInterview() method.
    }
}