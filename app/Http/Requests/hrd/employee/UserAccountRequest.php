<?php

namespace App\Http\Requests\hrd\employee;

use Illuminate\Foundation\Http\FormRequest;

class UserAccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'status_karyawan' => ['nullable', 'string'],
            'tanggal_keluar' => ['nullable', 'date', 'date_format:Y-m-d'],
        ];
    }
}
