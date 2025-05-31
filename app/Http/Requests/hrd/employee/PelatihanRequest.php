<?php

namespace App\Http\Requests\hrd\employee;

use Illuminate\Foundation\Http\FormRequest;

class PelatihanRequest extends FormRequest
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
            'id_pelatihan' => ['nullable', 'integer'],
            'nik' => ['nullable', 'string'],
            'jenis_pelatihan' => ['nullable', 'string'],
            'lainlain_pelatihan' => ['nullable', 'string'],
            'sertifikat_kompetensi' => ['nullable','string'],
            'nama_pelatihan' => ['nullable','string'],
            'tempat_pelatihan' => ['nullable','string'],
            'penyelenggara' => ['nullable','string'],
            'tanggal_mulai_pelatihan' => ['nullable','date'],
            'tanggal_selesai_pelatihan' => ['nullable','date'],
            'nomor_sertifikat_pelatihan' => ['nullable','string'],
            'tanggal_sertifikat_pelatihan' => ['nullable','date'],
            'file_sertifikat' => ['nullable', 'file', 'max:2048'],
        ];
    }
}
