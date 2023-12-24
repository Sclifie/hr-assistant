<?php

namespace App\Services\InterviewService;

use App\Enums\InterviewStatusesEnum;
use App\Models\Employee;
use App\Models\Interview;
use Illuminate\Support\Facades\DB;

class InterviewService implements InterviewServiceInterface
{
    protected array $interviewCreators = [
        'open' => InterviewOpen::class,
        'rejected' => InterviewRejected::class,
        'passed' => InterviewPassed::class,
    ];
    
    public function createInterview($interviewData): false|Interview
    {
        return (new $this->interviewCreators[$interviewData['status']])
            ->createInterview($interviewData);
    }
}