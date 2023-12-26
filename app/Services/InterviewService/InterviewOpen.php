<?php

namespace App\Services\InterviewService;

use App\Models\Interview;

class InterviewOpen extends InterviewService implements InterviewServiceInterface
{
    public function createInterview($interviewData): Interview
    {
        return Interview::create($interviewData);
    }
}