<?php

namespace App\Livewire\Pages\Interview;

use App\Enums\InterviewStatusesEnum;
use App\Http\Requests\InterviewRequest;
use App\Livewire\Forms\InterviewForm;
use App\Models\Interview;
use App\Models\Position;

use App\Services\InterviewService\InterviewService;
use Livewire\Component;

class Create extends Component
{
    public InterviewForm $interview;
    public $positionOptions;
    public $statusOptions;
    
    public function mount(Interview $interview = null)
    {
        $this->positionOptions = Position::all();
        $this->statusOptions = InterviewStatusesEnum::cases();
    }
    
    public function updateInterview()
    {
       InterviewService::createInterview($this->interview->validate());
    }
    
    public function render()
    {
        return view('livewire.pages.interview.create');
    }
}
