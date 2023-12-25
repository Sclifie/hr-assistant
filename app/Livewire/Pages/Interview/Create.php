<?php

namespace App\Livewire\Pages\Interview;

use App\Enums\InterviewStatusesEnum;
use App\Models\Interview;
use App\Models\Position;

use Livewire\Component;

class Create extends Component
{
    public $interview;
    public $positionOptions;
    public $statusOptions;
    public function mount(Interview $interview)
    {
        $this->positionOptions = Position::all();
        $this->statusOptions = InterviewStatusesEnum::cases();
        $this->interview = $interview;
    }
    
    public function updateInterview()
    {
        dd($this->interview);
    }
    
    public function render()
    {
        return view('livewire.pages.interview.create');
    }
}
