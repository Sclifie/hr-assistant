<?php

namespace App\Events\Employee;

use App\Models\Employee;
use Illuminate\Foundation\Events\Dispatchable;

class CreatedEvent
{
    use Dispatchable;
    
    public Employee $employee;
    
    public function __construct(Employee $employee)
    {}
}
