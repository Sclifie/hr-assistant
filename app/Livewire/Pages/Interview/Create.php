<?php

namespace App\Livewire\Pages\Interview;

use App\Enums\InterviewStatusesEnum;
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
    
    private $interview;
    public $positionOptions;
    public $statusOptions;
    
    public function mount()
    {
        $this->positionOptions = Position::all();
        $this->statusOptions = InterviewStatusesEnum::cases();
    }
    
    public function createInterview()
    {
        try {
            $this->interview = InterviewFacade::createInterview($this->interviewForm->validate());
        } catch (\Exception $exception){
            $this->errorDialog();
        }
        
//        $this->successDialog();
    }
    
    public function errorDialog(): void
    {
        $this->dialog()->show([
            'icon' => 'error',
            'title' => 'Error Dialog!',
            'description' => __('interview.Interview Not Saved Please Connect with Administrator.'),
        ]);
    }
    
    public function successDialog(): void
    {
        $this->dialog()->show([
            'icon' => 'success',
            'title' => 'Success Dialog!',
            'description' => 'This is a description.',
        ]);
    }
    
    public function render()
    {
        return view('livewire.pages.interview.create');
    }
}
