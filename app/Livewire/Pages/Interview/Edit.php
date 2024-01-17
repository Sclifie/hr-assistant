<?php

namespace App\Livewire\Pages\Interview;

use App\Enums\InterviewStatusesEnum;
use App\Http\Requests\InterviewRequest;
use App\Livewire\Forms\InterviewForm;
use App\Models\Interview;
use App\Models\Position;

use App\Services\InterviewService\InterviewService;
use Livewire\Component;

class Edit extends Component
{
    public InterviewForm $interviewForm;
    public $positionOptions;
    private InterviewService $interviewService;
    public $statusOptions;
    public function mount(Interview $interview, InterviewService $interviewService)
    {
        $this->interviewService = $interviewService;
        $this->positionOptions = Position::all();
        $this->statusOptions = InterviewStatusesEnum::cases();
        $this->interviewForm->fill($interview->toArray());
    }
    
    public function updateInterview()
    {
        $validated = $this->interviewForm->validateForm();
        $this->interviewService->updateInterview($validated);
    }
    
    public function render()
    {
        return view('livewire.pages.interview.edit');
    }
}
