<?php

namespace App\Http\Requests\hrd;

use Illuminate\Foundation\Http\FormRequest;

class MasterEselonRequest extends FormRequest
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
            'nama_masteresl' => ['required', 'min:3', 'max:255', 'string']
        ];
    }
}
