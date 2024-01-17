<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Form;

class PositionForm extends Form
{
    #[Locked]
    public int $id;
    
    #[Rule(['min:3','max:255','string'],['name' => 'Название позиции'],['name' => '"Название позиции"'])]
    public string $name;
}