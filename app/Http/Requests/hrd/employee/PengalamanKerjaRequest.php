<?php

namespace App\Http\Requests\hrd\employee;

use Illuminate\Foundation\Http\FormRequest;

class PengalamanKerjaRequest extends FormRequest
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
            'id_history' => ['nullable', 'integer'],
            'nik' => ['nullable', 'string'],
            'periode_start' => ['nullable','date'],
            'periode_end' => ['nullable','date'],
            'nama_perusahaan' => ['nullable', 'string'],
            'jenis_usaha' => ['nullable', 'string'],
            'alamat' => ['nullable', 'string'],
            'posisi_awal' => ['nullable', 'string'],
            'posisi_akhir' => ['nullable', 'string'],
            'jumlah_karyawan' => ['nullable', 'integer'],
            'keterangan' => ['nullable', 'string'],
            'file' => ['nullable', 'file', 'max:2048'],
        ];
    }
}
