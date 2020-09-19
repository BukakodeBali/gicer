<?php


namespace App\Http\Requests;


use Urameshibr\Requests\FormRequest;

class ClientLoginRequest extends FormRequest
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
            'code' => 'required|exists:users,username',
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
            'code.required' => 'Kode perusahaan wajib isi',
            'code.exists' => 'Kode perusahaan tidak ditemukan',
            'password.required' => 'Password wajib isi',
            'password.min' => 'Password minimal 8 karakter'
        ];
    }
}
