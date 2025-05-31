<?php

namespace App\Http\Requests\hrd;

use Illuminate\Foundation\Http\FormRequest;

class HirarkiUserGeneralRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'unit_approval' => ['nullable', 'max:255', 'string'],
            'subsi_approval' => ['nullable', 'max:255', 'string'],
            'kasie_approval' => ['nullable', 'max:255', 'string'],
            'kadept_approval' => ['nullable', 'max:255', 'string'],
            'kadiv_approval' => ['nullable', 'max:255', 'string'],
            'direktorat_approval' => ['nullable', 'max:255', 'string'],
        ];
    }
}
