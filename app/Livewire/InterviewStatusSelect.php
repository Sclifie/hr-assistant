<?php

namespace App\Livewire;

use App\Enums\InterviewStatusesEnum;
use Livewire\Component;

class InterviewStatusSelect extends Component
{
    public $statuses;
    public $label;
    public $value;
    
    public function mount($value)
    {
        $this->value = $value;
        $this->label = __('Status');
        $this->statuses = InterviewStatusesEnum::cases();
    }
    
    public function render()
    {
        return view('livewire.status-select');
    }
}
