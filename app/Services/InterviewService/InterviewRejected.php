<?php

namespace App\Services\InterviewService;

use App\Models\Interview;

class InterviewRejected extends InterviewService implements InterviewServiceInterface
{
    public function createInterview($interviewData): \DomainException|Interview
    {
        self::log('Interview Rejected Created at ' . __CLASS__, 'info');
        return Interview::create($interviewData);
    }
}