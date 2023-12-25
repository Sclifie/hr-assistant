<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use Livewire\Form;

class EditInterviewForm extends Component
{
    public $interview = null;

    public function mount($interview)
    {
        $this->interview = $interview;
    }
    
    public function render()
    {
        return view('livewire.interview.edit-interview-form');
    }
}