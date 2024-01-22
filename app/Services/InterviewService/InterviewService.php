<?php

namespace App\Services\InterviewService;

use App\Enums\InterviewStatusesEnum;
use App\Exceptions\InterviewException;
use App\Models\Employee;
use App\Models\Interview;
use Exception;
use Illuminate\Support\Facades\DB;
use Psy\CodeCleaner\AbstractClassPass;

class InterviewService extends InterviewServiceAbstract implements InterviewServiceInterface
{
    
    protected ?Interview $interview;
    
    private array $interviewWithStatus = [
        //  Начальное интервью добавить отправку сообщение о назначении на время
        'open' => InterviewOpen::class,
        //  Не пройденное интервью добавить отправку сообщение о не пройденом + причина + перемещение в архив
        'rejected' => InterviewRejected::class,
        //  Пройденное интервью добавить отправку сообщение о пройденом + создание Employee + перемещение в архив
        'passed' => InterviewPassed::class,
        //  Из статуса passed → archived → blocked
        'archived' => InterviewArchived::class,
    ];
    
    /**
     * @param Interview $interview
     * @param array $newInterviewData
     * @return Interview
     * @throws InterviewException
     */
    public function updateInterview(Interview $interview, array $newInterviewData): Interview
    {
        $interview = (new $this->interviewWithStatus[$newInterviewData['status']])
            ->updateInterview($interview, $newInterviewData);
        
        if( !$interview instanceof Interview ){
            \Log::error("Interview not updated in " . __CLASS__);
            throw new InterviewException('Interview not updated');
        }
        
        return $interview;
    }
    
}