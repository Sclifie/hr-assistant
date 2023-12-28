<?php

namespace App\Services\InterviewService;

use App\Enums\InterviewStatusesEnum;
use App\Models\Employee;
use App\Models\Interview;
use Illuminate\Support\Facades\DB;
use Psy\CodeCleaner\AbstractClassPass;

class InterviewService extends InterviewServiceAbstract implements InterviewServiceInterface
{
    private array $interviewWithStatus = [
        'open' => InterviewOpen::class,
        'rejected' => InterviewRejected::class,
        'passed' => InterviewPassed::class,
    ];
    
    /**
     * @throws \Exception
     */
    public function createInterview($interviewData): \Exception|Interview
    {
//      Выбираем создателя по статусу
        $interview = (new $this->interviewWithStatus[$interviewData['status']])
            ->createInterview($interviewData);
        
//      Если создатель не вернул модельку
        if( !$interview instanceof Interview ){
            \Log::error("Interview not created in " . __CLASS__);
            throw new \Exception('Interview not created');
        }
        
        return $interview;
    }
    
    /**
     * @throws \Exception
     */
    public function updateInterview(array $interviewData): Interview
    {
        $interview = (new $this->interviewWithStatus[$interviewData['status']])
            ->updateInterview($interviewData);
        
        if( !$interview instanceof Interview ){
            \Log::error("Interview not updated in " . __CLASS__);
            throw new \Exception('Interview not updated');
        }
        
        return $interview;
    }
}