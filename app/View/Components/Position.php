<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Position extends Component
{
    public function render(): View
    {
        return view('components.position');
    }
}
