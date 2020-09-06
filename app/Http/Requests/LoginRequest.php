<?php

namespace App\Http\Requests;

use Urameshibr\Requests\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|exists:users',
            'password' => 'required|min:8'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'Email wajib isi',
            'email.email'  => 'Email tidak valid',
            'email.exists' => 'Email tidak ditemukan',
            'password.required' => 'Password wajib isi',
            'password.min' => 'Password minimal 8 karakter'
        ];
    }
}
