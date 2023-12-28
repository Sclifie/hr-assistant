<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HireOrderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'salary' => ['required'],
        ];
    }
    
    public function authorize(): bool
    {
        return true;
    }
}
