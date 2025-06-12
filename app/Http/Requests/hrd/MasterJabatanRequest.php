<?php

namespace App\Http\Requests\hrd;

use Illuminate\Foundation\Http\FormRequest;

class MasterJabatanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'kode_jabatan' => ['nullable', 'string'],
            'execute_by' => ['nullable', 'string'],
            'nama_masterjab' => ['required', 'min:3', 'max:255', 'string']
        ];
    }
}
