<?php

namespace App\Livewire\Pages\Interview;

use App\Enums\InterviewStatusesEnum;
use App\Http\Requests\InterviewRequest;
use App\Livewire\Forms\InterviewForm;
use App\Models\Interview;
use App\Models\Position;

use App\Facades\InterviewFacade;
use Livewire\Component;
use WireUi\Traits\Actions;

class Create extends Component
{
    use Actions;
    
    public InterviewForm $interviewForm;
    public $positionOptions;
    public $statusOptions;
    
    public function mount(Interview $interview = null)
    {
        $this->positionOptions = Position::all();
        $this->statusOptions = InterviewStatusesEnum::cases();
    }
    
    public function createInterview()
    {
        dd($this->interviewForm);
        InterviewFacade::createInterview($this->interviewForm->validate());
        
        try {
            InterviewFacade::createInterview($this->interview->validate());
        } catch (\DomainException $exception){
            $this->dispatch('exception',['title' => 'err','msg']);
        }
    }
    
    public function render()
    {
        return view('livewire.pages.interview.create');
    }
}
