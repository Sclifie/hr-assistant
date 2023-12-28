<?php

namespace App\Services\InterviewService;

use App\Interfaces\Logged;
use App\Models\Employee;
use App\Models\Interview;
use Illuminate\Support\Facades\DB;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;

class InterviewPassed extends InterviewServiceAbstract implements InterviewServiceInterface
{
    public function createInterview($interviewData): Interview
    {
        return DB::transaction(function () use ($interviewData) {
            $interview = parent::createInterview($interviewData);
            //  Удаляем повторное создание интерьвью
            
            if($interview->employee_id === null){
                $newEmployee = Employee::create($interview->only(['first_name','last_name','email']));
                $interview->update(['employee_id' => $newEmployee->id]);
                return $interview->refresh();
            }
            
            return $interview;
        }, 3);
    }
    
    public function updateInterview(array $interviewData): Interview
    {
        // TODO: Implement updateInterview() method.
    }
}