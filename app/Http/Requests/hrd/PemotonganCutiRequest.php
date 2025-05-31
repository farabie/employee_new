<?php

namespace App\Http\Requests\hrd;

use Illuminate\Foundation\Http\FormRequest;

class PemotonganCutiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'jenis_cuti' => ['nullable', 'max:255', 'string'],
            'tgl_mulai' => ['nullable', 'date'],
            'tgl_selesai' => ['nullable', 'date'],
            'jenis_setup_cuti' => ['nullable', 'max:255', 'string'],
            'lama_cuti' => ['nullable', 'integer', 'max:11'],
            'keterangan' => ['nullable', 'max:255', 'string'],
            'created_by' => ['nullable', 'max:50', 'string'],
        ];
    }
}
