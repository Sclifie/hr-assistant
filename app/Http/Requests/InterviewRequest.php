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
            'status' => ['required'],
            'employee_id' => ['nullable', 'integer'],
            'position_id' => ['required']
        ];
    }
    
    public function authorize(): bool
    {
        return true;
    }
}
