<?php

namespace App\Services\InterviewService;

use App\Enums\InterviewStatusesEnum;
use App\Events\InterviewPassedEvent;
use App\Interfaces\Logged;
use App\Models\Employee;
use App\Models\Interview;
use Illuminate\Support\Facades\DB;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;

class InterviewPassed extends InterviewServiceAbstract implements InterviewServiceInterface
{
    public function updateInterview(Interview $interview, array $newInterviewData = []): Interview
    {
        $interview = DB::transaction(function () use ($interview, $newInterviewData) {
            //  Предохраняемся от повторного создание интервью
            if($interview->employee_id === null){
                $newEmployee = Employee::create($interview->only(['first_name','last_name','email']));
                $interview->update([
                    'employee_id' => $newEmployee->id,
                    'status' => InterviewStatusesEnum::ARCHIVED->value,
                ]);
                
                return $interview->refresh();
            }
            $interview->update($newInterviewData);
            return $interview->refresh();
        }, 3);
        
        $this->callEvents($interview);
        
        return $interview;
    }
    
    protected function callEvents($interview): void
    {
        InterviewPassedEvent::dispatch($interview);
    }
}