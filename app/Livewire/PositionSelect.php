<?php

namespace App\Livewire;

use App\Livewire\Forms\InterviewForm;
use App\Models\Position;
use Livewire\Component;

class PositionSelect extends Component
{
    public $options;
    public $value;
    public $form;
    
    public function mount($form)
    {
        $this->form = $form;
        $this->options = Position::all();
    }
    
    public function update()
    {
    
    }
    
    public function render()
    {
        return view('livewire.position-select');
    }
}
