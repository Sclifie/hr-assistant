<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'adress' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'status' => ['required'],
        ];
    }
    
    public function authorize(): bool
    {
        return true;
    }
}
