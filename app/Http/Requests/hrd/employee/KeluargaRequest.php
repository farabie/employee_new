<?php

namespace App\Http\Requests\hrd\employee;

use Illuminate\Foundation\Http\FormRequest;

class KeluargaRequest extends FormRequest
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
            'id' => ['nullable', 'string'],
            'id_user' => ['nullable', 'string'],
            'nama' => ['nullable', 'string'],
            'tmp_lhr' => ['nullable','string'],
            'tgl_lhr' => ['nullable', 'date', 'date_format:Y-m-d'],
            'jk' => ['nullable','string'],
            'pendidikan' => ['nullable','string'],
            'pekerjaan' => ['nullable','string'],
            'status_hub' => ['nullable','string'],
        ];
    }
}
