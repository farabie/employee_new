<?php

namespace App\Http\Requests\hrd\employee;

use Illuminate\Foundation\Http\FormRequest;

class KontakDaruratRequest extends FormRequest
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
            'kontak_darurat1' => ['nullable', 'string'],
            'nama_kontak_darurat1' => ['nullable', 'string'],
            'hub_kontak_darurat1' => ['nullable','string'],
            'kontak_darurat2' => ['nullable','string'],
            'nama_kontak_darurat2' => ['nullable','string'],
            'hub_kontak_darurat2' => ['nullable','string'],
        ];
    }
}
