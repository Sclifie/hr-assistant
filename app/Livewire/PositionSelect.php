<?php

namespace App\Livewire;

use App\Models\Position;
use Livewire\Component;

class PositionSelect extends Component
{
    public $options;
    public $label;
    
    public function mount()
    {
        $this->label = __('Position');
        $this->options = Position::all();
    }
    
    public function render()
    {
        return view('livewire.position-select');
    }
}
