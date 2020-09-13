<?php


namespace App\Http\Requests;


use Urameshibr\Requests\FormRequest;

class UserUpdateRequest extends FormRequest
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
        $id = $this->segment(2);
        return [
            'username'  => 'required',
            'email'     => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|min:8',
            'password_confirmation' => 'required_with:password|same:password',
            'role' => 'required|exists:roles,id',
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
            'password.min'      => 'Password minimal 8 karakter',
            'password_confirmation.required_with' => 'Konfirmasi password wajib isi',
            'password_confirmation.same' => 'Konfirmasi password tidak sama dengan password',
            'role.required' => 'Role wajib isi'
        ];
    }
}
