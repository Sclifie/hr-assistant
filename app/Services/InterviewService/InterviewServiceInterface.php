<?php

namespace App\Services\InterviewService;

use App\Models\Interview;

interface InterviewServiceInterface
{
    public function createInterview(array $interviewData) : Interview | \Exception;
    public function updateInterview(array $interviewData) : Interview;
}