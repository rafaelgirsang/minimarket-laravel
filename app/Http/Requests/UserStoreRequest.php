<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'nama' => 'required',
            'nik' => 'required|numeric|max_digits:16: min_digits:16',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'email' => 'required|email:dns|unique:user,email',
            'telpon' => 'required|numeric|unique:user,telpon',
            'password' => 'required|min:6',
            'cabang_id' => 'required',
            'role_id' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'nama' => ':attribute tidak boleh kosong',
            'nik.required' => ':attribute tidak boleh kosong',
            'nik.numeric' => ':attribute harus menggunakan angka',
            'nik.max_digits' => ':attribute harus berjumlah 16 digit angka',
            'nik.min_digits' => ':attribute harus berjumlah 16 digit angka',
            'jenis_kelamin' => ':attribute tidak boleh kosong',
            'tempat_lahir' => ':attribute tidak boleh kosong',
            'tanggal_lahir' => ':attribute tidak boleh kosong',        
            'alamat' => ':attribute tidak boleh kosong',
            'email.required' => ':attribute tidak boleh kosong',
            'email.email' => ':attribute tidak valid',
            'email.unique' => ':attribute sudah terdaftar',
            'telpon.required' => ':attribute tidak boleh kosong',           
            'telpon.numeric' => ':attribute harus menggunakan angka',           
            'telpon.unique' => ':attribute sudah terdaftar',           
            'password.required' => ':attribute tidak boleh kosong',        
            'password.min' => ':attribute min 6 karakter'    ,
            'cabang_id' => ':attribute tidak boleh kosong',              
            'role_id' => ':attribute tidak boleh kosong',              
        ];
    }

    public function attributes(): array
    {
        return [
            'nama' => 'Nama',
            'nik' => 'Nik',
            'jenis_kelamin' => 'Jenis Kelamin',
            'tanggal_lahir' => 'Tanggal lahir',
            'tempat_lahir' => 'Tempat lahir',
            'alamat' => 'Alamat',
            'email.required' => 'Email',
            'email.email' => 'Email',
            'email.unique' => 'Email',
            'telpon.required' => 'Telpon',           
            'telpon.numeric' => 'Telpon',           
            'telpon.unique' => 'Telpon',           
            'password.required' => 'Password',        
            'password.min' => 'Password'   ,
            'cabang_id' => 'Cabang',             
            'role_id' => 'Role',             
        ];
    }
}
