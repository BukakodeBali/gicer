<?php


namespace App\Http\Requests;


use Urameshibr\Requests\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'number'=> 'required|unique:products,number',
            'code'  => 'required|unique:products,code',
            'name'  => 'required',
            'period'=> 'required|numeric|min:0',
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
            'number.required' => 'Nomor produk wajib isi',
            'number.unique' => 'Nomor sudah digunakan',
            'code.required' => 'Kode wajib isi',
            'code.unique'   => 'Kode sudah digunakan',
            'name.required' => 'Nama produk wajib isi',
            'period.required' => 'Masa berlaku produk wajib isi',
            'period.numeric' => 'Masa berlaku tidak valid, gunakan format angka',
            'period.min' => 'Masa berlaku minimal 0'
        ];
    }
}
