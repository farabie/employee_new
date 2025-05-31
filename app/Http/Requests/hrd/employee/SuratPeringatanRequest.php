<?php

namespace App\Http\Requests\hrd\employee;

use Illuminate\Foundation\Http\FormRequest;

class SuratPeringatanRequest extends FormRequest
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
            'id_sp' => ['nullable', 'integer'],
            'nik' => ['nullable', 'string'],
            'jenis_sp' => ['nullable', 'string'],
            'periode_awal' => ['nullable','date'],
            'periode_akhir' => ['nullable','date'],
            'keterangan' => ['nullable', 'string'],
            'file' => ['nullable', 'file', 'max:2048'],
        ];
    }
}
