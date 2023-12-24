<?php

namespace App\Services\InterviewService;

use App\Models\Employee;
use App\Models\Interview;
use Illuminate\Support\Facades\DB;

class InterviewPassed implements InterviewServiceInterface
{
    public function createInterview($interviewData): Interview|false
    {
        try {
            $interview = DB::transaction(function () use ($interviewData) {
                $interview = Interview::firstOrCreate($interviewData);
                $newEmployee = Employee::create($interviewData);
                $interview->update(['employee_id' => $newEmployee->id]);
                return $interview->refresh();
            });
        } catch (\Exception $exception) {
            \Log::error('Model Interview not created into Transaction ' . $exception->getMessage());
            return false;
        }
        
        return $interview;
    }
}