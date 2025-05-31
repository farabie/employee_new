<?php

namespace App\Http\Requests\hrd\employee;

use Illuminate\Foundation\Http\FormRequest;

class RekamMedisRequest extends FormRequest
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
            'tinggi_badan' => ['nullable', 'string'],
            'berat_badan' => ['nullable', 'string'],
            'lensa_kacamata' => ['nullable','string'],
            'ukuran_baju' => ['nullable','string'],
            'ukuran_sepatu' => ['nullable','string']
        ];
    }
}
