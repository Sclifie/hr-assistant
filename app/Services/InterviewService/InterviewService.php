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
        //  Начальное интервью добавить отправку сообщение о назначении на время
        'open' => InterviewOpen::class,
        //  Не пройденное интервью добавить отправку сообщение о не пройденом + причина + перемещение в архив
        'rejected' => InterviewRejected::class,
        //  Пройденное интервью добавить отправку сообщение о пройденом + создание Employee + перемещение в архив
        'passed' => InterviewPassed::class,
    ];
    
    /**
     * @param Interview $interview
     * @return Interview
     * @throws Exception
     */
    public function updateInterview(array|Interview $interview): Interview
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