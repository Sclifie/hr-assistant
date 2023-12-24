<?php

namespace App\Livewire;

use App\Enums\InterviewStatusesEnum;
use Livewire\Component;

class InterviewStatusSelect extends Component
{
    public $statuses;
    public $label;
    
    public function mount()
    {
        $this->label = __('Status');
        $this->statuses = InterviewStatusesEnum::cases();
    }
    
    public function render()
    {
        return view('livewire.status-select');
    }
}
