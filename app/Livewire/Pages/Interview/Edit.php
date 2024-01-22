<?php

namespace App\Livewire\Pages\Interview;

use App\Enums\InterviewStatusesEnum;
use App\Facades\InterviewFacade;
use App\Http\Requests\InterviewRequest;
use App\Livewire\Forms\InterviewForm;
use App\Models\Interview;
use App\Models\Position;

use App\Services\InterviewService\InterviewService;
use Livewire\Component;
use WireUi\Traits\Actions;

class Edit extends Component
{
    use Actions;
    public InterviewForm $interviewForm;
    public Interview $interview;
    public $positionOptions;
    public $statusOptions;
    public function mount(Interview $interview)
    {
        $this->positionOptions = Position::all();
        $this->interview = $interview;
        $this->statusOptions = InterviewStatusesEnum::cases();
        $this->interviewForm->fill($interview->toArray());
    }
    
    /**
     * @throws \Exception
     */
    public function updateInterview()
    {
        $validated = $this->interviewForm->validateForm();
        
        $interview = InterviewFacade::updateInterview($this->interview, $validated);
        if($interview instanceof Interview){
            $this->notification();
        }
    }
    
    public function render()
    {
        return view('livewire.pages.interview.edit');
    }
}
