<?php

namespace App\Http\Requests\hrd;

use Illuminate\Foundation\Http\FormRequest;

class ApprovalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'atasan1_general' => ['nullable', 'max:25', 'string'],
            'atasan2_general' => ['nullable', 'max:255', 'string'],
            'atasan1_spd' => ['nullable', 'max:25', 'string'],
            'atasan2_spd' => ['nullable', 'max:255', 'string'],
            'atasan1_ko' => ['nullable', 'max:25', 'string'],
        ]; 
    }
}
