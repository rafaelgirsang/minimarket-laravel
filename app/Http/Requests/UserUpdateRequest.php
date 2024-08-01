<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
            'nama_user' => 'required',
       
            'gender' => 'required',
        
           
          
            'email' => [
                    'required',
                    'unique:user,email,'.crypt_open($this->id),
                    'email'
            ],
            'telpon' => [
                'required',
                'numeric',
                           
             ],
            // 'password' => 'required|min:6',
        
            'role_id' => 'required',
            'is_active' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'nama_user' => ':attribute tidak boleh kosong',
          
            'gender' => ':attribute tidak boleh kosong',
           
            'email.required' => ':attribute tidak boleh kosong',
            'email.email' => ':attribute tidak valid',
            'email.unique' => ':attribute sudah terdaftar',
            'telpon.required' => ':attribute tidak boleh kosong',           
                
            'role_id' => ':attribute tidak boleh kosong',              
            'is_active' => ':attribute tidak boleh kosong',              
        ];
    }

    public function attributes(): array
    {
        return [
            'nama_user' => 'Nama',
      
            'gender' => 'Gender',
         
            'email.required' => 'Email',
            'email.email' => 'Email',
            'email.unique' => 'Email',
            'telpon.required' => 'Telpon',           
            'telpon.numeric' => 'Telpon',           
            'telpon.unique' => 'Telpon',        
             
            'role_id' => 'Role',             
            'is_active' => 'Status',             
        ];
    }
}
