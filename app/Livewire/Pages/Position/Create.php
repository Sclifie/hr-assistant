<?php

namespace App\Livewire\Pages\Position;

use App\Livewire\Forms\PositionForm;
use App\Models\Position;
use Livewire\Component;
use WireUi\Facades\WireUi;
use WireUi\Traits\Actions;
use function Symfony\Component\Translation\t;

class Create extends Component
{
    use Actions;
    public PositionForm $positionForm;
    public bool $saved = false;
    public string $notice = '';
    
    public function savePosition()
    {
        $position = Position::firstOrCreate($this->positionForm->validate());
        
        if($position !== null){
            $this->saved = true;
            $this->dispatch('position-saved');
        }
        
        $this->positionForm->name = $position->name;
    }
    
    public function render()
    {
        return view('livewire.pages.position.create');
    }
}
