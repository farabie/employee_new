<?php

namespace App\Http\Requests\hrd\employee;

use Illuminate\Foundation\Http\FormRequest;

class PendidikanRequest extends FormRequest
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
            'id_sekolah' => ['nullable', 'string'],
            'nik' => ['nullable', 'string'],
            'tingkat' => ['nullable', 'string'],
            'nama_sekolah' => ['nullable','string'],
            'lokasi' => ['nullable','string'],
            'jurusan' => ['nullable','string'],
            'tahun' => ['nullable','string'],
            'ijazah' => ['nullable','string'],
            'keterangan' => ['nullable','string'],
            'file' => ['nullable', 'file', 'max:2048'],
        ];
    }
}
