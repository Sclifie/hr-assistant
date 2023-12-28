<?php

namespace App\Livewire\Pages\Interview;

use App\Enums\InterviewStatusesEnum;
use App\Http\Requests\InterviewRequest;
use App\Livewire\Forms\InterviewForm;
use App\Models\Interview;
use App\Models\Position;

use Livewire\Component;

class Edit extends Component
{
    public InterviewForm $interviewForm;
    public $positionOptions;
    public $statusOptions;
    public function mount(Interview $interview = null)
    {
        $this->positionOptions = Position::all();
        $this->statusOptions = InterviewStatusesEnum::cases();

        if($interview !== null){
            $this->interviewForm->fill($interview->toArray());
        }
    }
    
    public function updateInterview()
    {
        dd($this->interviewForm->validate());
    }
    
    public function render()
    {
        return view('livewire.pages.interview.edit');
    }
}
