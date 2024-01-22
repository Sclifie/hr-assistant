<?php

namespace App\Services\InterviewService;

use App\Enums\InterviewStatusesEnum;
use App\Events\InterviewOpenEvent;
use App\Exceptions\InterviewException;
use App\Models\Interview;
use Exception;

abstract class InterviewServiceAbstract implements InterviewServiceInterface
{
    
    /**
     * Любое новое интервью создаётся со статусом открыто()
     * Иначе переписывается в наследнике
     * @param array $interviewData
     * @return Exception|Interview
     * @throws Exception
     */
    public function createInterview(array $interviewData): \Exception|Interview
    {
        $interviewData['status'] = InterviewStatusesEnum::OPEN->value;
        
        $interview = Interview::create($interviewData);
        
        if (!$interview instanceof Interview) {
            \Log::error("Interview not created in " . __CLASS__);
            throw new InterviewException('Interview not created');
        } else {
            event(new InterviewOpenEvent($interview));
        }
        
        return $interview;
    }
    
    public function updateInterview(Interview $interview, array $newInterviewData): Interview
    {
        $interview->update($newInterviewData);
        return $interview->refresh();
    }
}