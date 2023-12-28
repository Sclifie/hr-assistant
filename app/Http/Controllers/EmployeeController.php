<?php

namespace App\Http\Controllers;

use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index(Employee $employee)
    {
        return view('pages.employee.index', ['employees' => $employee->paginate(15)]);
    }
    
    public function create()
    {
        return view('pages.employee.create');
    }
}
