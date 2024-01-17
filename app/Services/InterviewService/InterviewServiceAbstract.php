<?php

namespace App\Services\InterviewService;

use App\Enums\InterviewStatusesEnum;
use App\Models\Interview;
use Exception;

abstract class InterviewServiceAbstract implements InterviewServiceInterface
{
    
    /**
     * @param array $interviewData
     * @return Exception|Interview
     * @throws Exception
     */
    public function createInterview(array $interviewData): \Exception|Interview
    {
//        Любое новое интервью создаётся со статусом открыто
        $interviewData['status'] = InterviewStatusesEnum::OPEN->value;
        
        $interview = Interview::create($interviewData);
        
        if (!$interview instanceof Interview) {
            \Log::error("Interview not created in " . __CLASS__);
            throw new Exception('Interview not created');
        }
        
        return Interview::firstOrCreate($interviewData);
    }
    
    abstract function updateInterview(Interview $interview): Interview;
}