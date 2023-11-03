<?php


namespace App\Http\Requests;


use Urameshibr\Requests\FormRequest;

class CertificateUpdateRequest extends FormRequest
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
            'client_id' => 'required|exists:clients,id',
            'issue_date'=> 'required|date',
            'status_id' => 'required|exists:status,id',
            'status'    => 'required',
            'reset_detail' => 'required|boolean'
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
            'client_id.required'    => 'Client wajib isi',
            'client_id.exists'      => 'Client tidak ditemukan',
            'issue_date.required'   => 'Issue date wajib isi',
            'issue_date.date'       => 'Issue date tidak valid',
            'status_id.required'    => 'Application status wajib isi',
            'status.required'       => 'Status wajib isi'
        ];
    }
}
