<?php

namespace App\Http\Requests\hrd;

use Illuminate\Foundation\Http\FormRequest;

class LiburNasionalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;;
    }

    public function rules(): array
    {
        return [
            'nama_libur' => ['nullable', 'max:255', 'string'],
            'tanggal_libur' => ['required', 'string', 'regex:/^(\d{2}-\d{2}-\d{4})(,\s*\d{2}-\d{2}-\d{4})*$/'], 
            'code' => ['nullable', 'max:255', 'string'],
        ];
    }

    // public function rules(): array
    // {
    //     return [
    //         'nama_libur' => ['required', 'max:255', 'string'],
    //         'tanggal_libur' => ['required', 'string'], // Validasi sebagai array
    //         'tanggal_libur.*' => ['date'], // Setiap item dalam array harus format tanggal
    //         'code' => ['required', 'max:255', 'string'],
    //     ];
    // }

}
