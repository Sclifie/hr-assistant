<?php

namespace App\Livewire\Components;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Form;

class Modal extends Component
{
    public string $content;
    public Form $form;
    public bool $show = false;
    
    #[On('show-modal')]
    public function showModal($content = 'test')
    {
        $this->content = $content;
        $this->show = true;
    }
    
    public function show()
    {
        $this->show = !$this->show;
    }
    
    public function render()
    {
    
    }
}