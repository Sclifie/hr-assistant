<?php

namespace App\Services\InterviewService;

use App\Models\Interview;

/**
 * Немножчко мне кажется это не правильно, но может быть кто-то подскажет
 */
interface InterviewServiceInterface
{
    public function createInterview(array $interviewData) : Interview | \Exception;
    public function updateInterview(array|Interview $interview) : Interview;
}