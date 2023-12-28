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
    
    public string $positionName;
    
    public function mount($form)
    {
        $this->form = $form;
        $this->options = Position::all();
    }
    
    public function createPosition()
    {
        Position::create(['name' => $this->positionName]);
        $this->render();
    }
    
    public function render()
    {
        return view('livewire.position-select');
    }
}
