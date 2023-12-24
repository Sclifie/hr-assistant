<?php

namespace App\Services\InterviewService;

use App\Models\Interview;

class InterviewOpen implements InterviewServiceInterface
{
    public function createInterview($interviewData): Interview|false
    {
        return Interview::create($interviewData);
    }
}