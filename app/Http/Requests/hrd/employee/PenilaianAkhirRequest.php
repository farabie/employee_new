<?php

namespace App\Http\Requests\hrd\employee;

use Illuminate\Foundation\Http\FormRequest;

class PenilaianAkhirRequest extends FormRequest
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
            'id_pa' => ['nullable', 'integer'],
            'nik' => ['nullable', 'string'],
            'nilai_pa' => ['nullable', 'string'],
            'tahun_pa' => ['nullable','string'],
        ];
    }
}
