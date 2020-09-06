<?php


namespace App\Http\Requests;

use Urameshibr\Requests\FormRequest;

class RoleStoreRequest extends FormRequest
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
            'name'          => 'required|unique:roles,name',
            'permissions'   => 'required|min:1|array'
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
            'name.required' => 'Nama role wajib isi',
            'name.unique' => 'Nama role sudah digunakan',
            'permissions.required'  => 'Permission wajib isi'
        ];
    }
}
