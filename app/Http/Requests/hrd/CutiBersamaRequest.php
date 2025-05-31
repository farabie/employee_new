<?php

namespace App\Http\Requests\hrd;

use Illuminate\Foundation\Http\FormRequest;

class CutiBersamaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama_cuti_bersama' => ['nullable', 'max:255', 'string'],
            'lama_cuti' => ['nullable', 'integer'],
            'tanggal_cuti_bersama' => ['required', 'string', 'regex:/^(\d{2}-\d{2}-\d{4})(,\s*\d{2}-\d{2}-\d{4})*$/'], 
            'code' => ['nullable', 'max:255', 'string'],
        ];
    }
}
