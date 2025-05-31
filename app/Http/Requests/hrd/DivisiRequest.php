<?php

namespace App\Http\Requests\hrd;

use Illuminate\Foundation\Http\FormRequest;

class DivisiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama' => ['required', 'min:3', 'max:255', 'string']
        ];
    }
}
