<?php

namespace App\Http\Requests\hrd;

use Illuminate\Foundation\Http\FormRequest;

class KuotaCutiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'jenis_edit_cuti' => ['nullable', 'string'],
            'jenis_tahun_cuti' => ['nullable', 'string'],
            'jenis_peg' => ['nullable', 'string'],
            'jumlah_cuti' => ['nullable', 'integer', 'min:1'], // Jumlah cuti harus lebih dari 0
            'keterangan' => ['nullable', 'string'],
            'peg_cuti' => ['nullable', 'array'], // Jika ada pegawai khusus, bisa multiple select
            'peg_cuti.*' => ['nullable', 'exists:tb_pegawai,nik'], // Pastikan pegawai valid dalam database
        ];
    }
}
