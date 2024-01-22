<?php

namespace App\Services\InterviewService;

use App\Events\InterviewOpenEvent;
use App\Models\Interview;

class InterviewArchived extends InterviewServiceAbstract implements InterviewServiceInterface
{
    
    public function updateInterview(Interview $interview, $newInterviewData): Interview
    {
        $interview->save($newInterviewData);
        return $interview->refresh();
    }

}