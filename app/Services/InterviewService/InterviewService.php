<?php

namespace App\Services\InterviewService;

use App\Enums\InterviewStatusesEnum;
use App\Models\Employee;
use App\Models\Interview;
use Exception;
use Illuminate\Support\Facades\DB;
use Psy\CodeCleaner\AbstractClassPass;

class InterviewService extends InterviewServiceAbstract implements InterviewServiceInterface
{
    
    protected Interview|null $interview;
    
    private array $interviewWithStatus = [
        'open' => InterviewOpen::class,
        'rejected' => InterviewRejected::class,
        'passed' => InterviewPassed::class,
    ];
    
    /**
     * @param Interview $interview
     * @return Interview
     * @throws Exception
     */
    public function updateInterview(Interview $interview): Interview
    {
        $interview = (new $this->interviewWithStatus[$interview['status']])
            ->updateInterview($interview);
        
        if( !$interview instanceof Interview ){
            \Log::error("Interview not updated in " . __CLASS__);
            throw new Exception('Interview not updated');
        }
        
        return $interview;
    }
}