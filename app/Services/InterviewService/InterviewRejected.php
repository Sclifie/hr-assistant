<?php

namespace App\Services\InterviewService;

use App\Models\Interview;

class InterviewRejected extends InterviewServiceAbstract implements InterviewServiceInterface
{
    public function updateInterview(array|Interview $interview): Interview
    {
        // TODO: смену статуса c open => rejected.
    }
}