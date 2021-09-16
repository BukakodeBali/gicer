<?php


namespace App\Http\Requests;


use Urameshibr\Requests\FormRequest;

class ClientUpdateRequest extends FormRequest
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
        $id = $this->segment(3);
        return [
            'code'      => 'required|unique:clients,code,'.$id,
            'name'      => 'required',
            'email'     => 'required|email|unique:clients,email,'.$id,
            'password'  => 'required|min:8'
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
            'code.required' => 'No Registrasi wajib isi',
            'code.unique'   => 'No Registrasi sudah digunakan',
            'name.required' => 'Nama perusahaan wajib isi',
            'email.required' => 'Email wajib isi',
            'email.unique' => 'Email sudah digunakan',
            'password.required' => 'Password wajib isi',
            'password.min' => 'Panjang password minimal 8 karakter'
        ];
    }
}
