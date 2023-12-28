<?php

namespace App\Livewire\Employee;

use App\Livewire\Forms\EmployeeForm;
use App\Models\Employee;
use Livewire\Component;

class Create extends Component
{
    public EmployeeForm $form;
    public function create()
    {
        Employee::createOrUpdate($this->form->validate());
    }
    public function render()
    {
        return view('livewire.employee.create');
    }
}
