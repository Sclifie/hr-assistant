<?php

namespace App\Services\InterviewService;

use App\Events\InterviewOpenEvent;
use App\Listeners\InterviewEventSubscriber;
use App\Models\Interview;

class InterviewOpen extends InterviewServiceAbstract implements InterviewServiceInterface
{

}