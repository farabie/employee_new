<?php

namespace App\Http\Requests\hrd\employee;

use Illuminate\Foundation\Http\FormRequest;

class NpwpRequest extends FormRequest
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
            'id_npwp' => ['nullable', 'integer'],
            'nik' => ['nullable', 'string'],
            'nomor_npwp' => ['nullable', 'string'],
            'tanggungan' => ['nullable', 'string'],
            'tgl_terdaftar' => ['nullable','date'],
            'alamat' => ['nullable', 'string'],
            'file' => ['nullable', 'file', 'max:2048'],
        ];
    }
}
