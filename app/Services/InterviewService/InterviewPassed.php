<?php

namespace App\Services\InterviewService;

use App\Interfaces\Logged;
use App\Models\Employee;
use App\Models\Interview;
use Illuminate\Support\Facades\DB;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;

class InterviewPassed extends InterviewService implements InterviewServiceInterface
{
    public function createInterview($interviewData): Interview
    {
        try {
            $interview = DB::transaction(function () use ($interviewData) {
                $interview = Interview::firstOrCreate($interviewData);
                $newEmployee = Employee::create($interviewData);
                $interview->update(['employee_id' => $newEmployee->id]);
                return $interview->refresh();
            }, 3);
        } catch (\Exception $exception) {
            //PDOException или DeadLockException по-идее лучше всего писать на оба варианта.
            self::log($exception->getMessage() . ' ' . __CLASS__,'error');
        }
        
        return $interview;
    }
    
}