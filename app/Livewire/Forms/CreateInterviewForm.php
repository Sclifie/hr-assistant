<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use Livewire\Form;

class CreateInterviewForm extends Component
{
    public $interview = null;
    public $options;

    public function mount($interview)
    {
        $this->options = I
        $this->interview = $interview;
    }
    
    public function render()
    {
        return view('livewire.interview.create-interview-form');
    }
}