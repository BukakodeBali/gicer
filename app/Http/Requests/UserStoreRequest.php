<?php


namespace App\Http\Requests;

use Urameshibr\Requests\FormRequest;

class UserStoreRequest extends FormRequest
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
            'username'  => 'required',
            'email'     => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
            'roles' => 'required|array|min:1',
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
            'username.required' => 'Username wajib isi',
            'email.required'    => 'Email wajib isi',
            'email.email'       => 'Email tidak valid',
            'email.unique'      => 'Email sudah digunakan',
            'password.required' => 'Password wajib isi',
            'password.min'      => 'Password minimal 8 karakter',
            'password_confirmation.required' => 'Konfirmasi password wajib isi',
            'password_confirmation.same' => 'Konfirmasi password tidak sama dengan password',
            'roles.required' => 'Role wajib isi'
        ];
    }
}
