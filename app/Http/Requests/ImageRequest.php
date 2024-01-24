<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['nullable'],
            'description' => ['nullable'],
            'path' => ['nullable'],
            'volume' => ['nullable'],
            'size' => ['nullable'],
        ];
    }
    
    public function authorize(): bool
    {
        return true;
    }
}
