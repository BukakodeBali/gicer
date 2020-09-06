<?php


namespace App\Http\Requests;


use Urameshibr\Requests\FormRequest;

class ScopeUpdateRequest extends FormRequest
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
            'code'  => 'required|unique:scopes,code,'.$id,
            'name'  => 'required',
            'description' => 'nullable'
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
            'code.required' => 'Kode atau nomor wajib isi',
            'code.unique'   => 'Kode atau nomor sudah digunakan',
            'name.required' => 'Nama scope wajib isi'
        ];
    }
}
