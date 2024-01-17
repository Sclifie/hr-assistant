<?php

namespace App\Services\InterviewService;

use App\Events\InterviewOpenEvent;
use App\Models\Interview;

class InterviewOpen extends InterviewServiceAbstract implements InterviewServiceInterface
{
    public function createInterview(array $interviewData): \Exception|Interview
    {
        $interview = parent::createInterview($interviewData);
        
        event(new InterviewOpenEvent($interview));
    }
    
    public function updateInterview(array|Interview $interview): Interview
    {
        // TODO: Implement updateInterview() method.
    }
}