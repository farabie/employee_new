<?php

namespace App\Http\Requests\hrd\employee;

use Illuminate\Foundation\Http\FormRequest;

class DataPribadiRequest extends FormRequest
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
            'nama' => ['nullable', 'string'],
            'tempat_lhr' => ['nullable', 'string'],
            'tgl_lhr' => ['nullable', 'date', 'date_format:Y-m-d'],
            'jk' => ['nullable','string'],
            'agama' => ['nullable', 'string'],
            'gol_darah' => ['nullable', 'string'],
            'status_nikah' => ['nullable', 'string'],
            'alamat' => ['nullable', 'string'],
            'alamat_domisili' => ['nullable', 'string'],
        ];
    }
}
