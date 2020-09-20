<?php


namespace App\Http\Requests;


use Urameshibr\Requests\FormRequest;

class ContactRequest extends FormRequest
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
            'email'     => 'required|email',
            'name'      => 'required',
            'subject'   => 'required|min:10',
            'message'   => 'required|min:20'
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
            'email.required'    => 'Email wajib isi',
            'email.email'       => 'Email tidak valid',
            'name.required'     => 'Nama wajib isi',
            'subject.required'  => 'Subject wajib isi',
            'subject.min'       => 'Subject minimal 10 karakter',
            'message.required'  => 'Message wajib isi',
            'message.min'       => 'Message minimal 20 karakter'
        ];
    }
}
