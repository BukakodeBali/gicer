<?php


namespace App\Http\Requests;


use Urameshibr\Requests\FormRequest;

class StatusStoreRequest extends FormRequest
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
            'name'  => 'required',
            'period' => 'required|min:0|numeric'
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
            'name.required' => 'Status wajib isi',
            'period.required'   => 'Periode wajib isi',
            'period.min' => 'Minimal periode 0',
            'period.numeric' => 'Periode hanya boleh angka'
        ];
    }
}
