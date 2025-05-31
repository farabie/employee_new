<?php

namespace App\Http\Requests\hrd\employee;

use Illuminate\Foundation\Http\FormRequest;

class KontrakKaryawanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id_kontrak' => ['nullable', 'string'],
            'nik' => ['nullable', 'string'],
            'status_kontrak' => ['nullable', 'string'],
            'tgl_kontrak' => ['nullable','date'],
            'kontrak_ke' => ['nullable', 'string'],
        ];
    }
}
