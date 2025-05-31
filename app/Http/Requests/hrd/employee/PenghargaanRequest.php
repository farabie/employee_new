<?php

namespace App\Http\Requests\hrd\employee;

use Illuminate\Foundation\Http\FormRequest;

class PenghargaanRequest extends FormRequest
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
            'id_penghargaan' => ['nullable', 'integer'],
            'nik' => ['nullable', 'string'],
            'penghargaan' => ['nullable', 'string'],
            'tahun' => ['nullable', 'string'],
            'pemberi' => ['nullable','string'],
            'file' => ['nullable', 'file', 'max:2048'],
        ];
    }
}
