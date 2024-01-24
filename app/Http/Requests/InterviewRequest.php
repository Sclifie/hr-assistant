<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InterviewRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'status' => ['nullable'],
            'employee_id' => ['nullable', 'integer','exists:App\Models\Employee,id'],
            'position_id' => ['required','exists:App\Models\Position,id'],
            'photo' => ['image','max:2048']
        ];
    }
    
    public function attributes()
    {
        return [
            'status' => trans('interview.Status'),
            'employee_id' => trans('employee.Employee'),
            'position_id' => 'Позиция'
        ];
    }
    
    public function authorize(): bool
    {
        return true;
    }
}
