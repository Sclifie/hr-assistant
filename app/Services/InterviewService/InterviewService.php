<?php

namespace App\Services\InterviewService;

use App\Enums\InterviewStatusesEnum;
use App\Models\Employee;
use App\Models\Interview;
use Illuminate\Support\Facades\DB;

class InterviewService extends InterviewServiceAbstract implements InterviewServiceInterface
{
    private array $interviewCreators = [
        'open' => InterviewOpen::class,
        'rejected' => InterviewRejected::class,
        'passed' => InterviewPassed::class,
    ];
    
    public function createInterview($interviewData): \DomainException|Interview
    {
        $interview = (new $this->interviewCreators[$interviewData['status']])
            ->createInterview($interviewData);
//        Затычка для тестирования
//        $interview = false;
        
        if( !$interview instanceof Interview ){
            \Log::error("Interview not created in " . __CLASS__);
            throw new \DomainException('Interview not created');
        }
        
        return $interview;
    }
}