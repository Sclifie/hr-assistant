<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class EmployeeForm extends Form
{
    #[Rule(['required'])]
    public $first_name = '';
    
    #[Rule(['required'])]
    public $last_name = '';
    
    #[Rule(['required'])]
    public $address = '';
    
    #[Rule(['required', 'email', 'max:254'])]
    public $email = '';
    
    #[Rule(['required'])]
    public $status = '';
    
    #[Rule(['exists:positions,id'])]
    public $position_id;
}
