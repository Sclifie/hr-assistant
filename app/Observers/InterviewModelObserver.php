<?php

namespace App\Observers;

use App\Enums\InterviewStatusesEnum;
use App\Models\Interview;

class InterviewModelObserver
{
    public function updated(Interview $interview): void
    {
        $originalAttributes = $interview->getOriginal();
        
        if ($interview->status === InterviewStatusesEnum::PASSED){
            $interview->employee()->create(request()->all());
        }
    }
}
