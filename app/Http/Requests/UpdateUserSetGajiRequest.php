<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserSetGajiRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'pokok' => 'required|numeric',
            'tunjangan' => 'required|numeric',
            'insentif' => 'required|numeric',
            'lembur' => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [

            'pokok.required' => ':attribute tidak boleh kosong',
            'pokok.numeric' => ':attribute harus menggunakan angka',
            'tunjangan.required' => ':attribute tidak boleh kosong',
            'tunjangan.numeric' => ':attribute harus menggunakan angka',
            'insentif.required' => ':attribute tidak boleh kosong',
            'insentif.numeric' => ':attribute harus menggunakan angka',
            'lembur.required' => ':attribute tidak boleh kosong',
            'lembur.numeric' => ':attribute harus menggunakan angka',

        ];
    }

    public function attributes(): array
    {
        return [
            'pokok' => 'Gaji pokok',
            'tunjangan' => 'Tunjangan',
            'insentif' => 'Insentif',
            'lembur' => 'Lembur',

        ];
    }
}
