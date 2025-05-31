<?php

namespace App\Http\Requests\hrd\employee;

use Illuminate\Foundation\Http\FormRequest;

class InformasiKaryawanRequest extends FormRequest
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
            'unit_kerja' => ['nullable', 'integer'],
            'id_departement' => ['nullable', 'integer'],
            'tanggal_masuk' => ['nullable','date'],
            'lok_kerja' => ['nullable','string'],
            'jenis_peg' => ['nullable','string'],
            'company' => ['nullable','string'],
            'status_kepeg' => ['nullable','string'],
            'jabatan' => ['nullable', 'string'],
            'eselon' => ['nullable','string'],
            'posisi' => ['nullable','string'],
        ];
    }
}
