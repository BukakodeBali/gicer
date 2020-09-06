<?php


namespace App\Http\Requests;


use Urameshibr\Requests\FormRequest;

class CertificateStoreRequest extends FormRequest
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
            'product_id'=> 'required|exists:products,id',
            'issue_date'=> 'required|date',
            'status_id' => 'required|exists:status,id',
            'status'    => 'required'
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
            'product_id.required'   => 'Produk wajib isi',
            'product_id.exists'     => 'Produk tidak ditemukan',
            'issue_date.required'   => 'Issue date wajib isi',
            'issue_date.date'       => 'Issue date tidak valid',
            'status_id.required'    => 'Application status wajib isi',
            'status.required'       => 'Status wajib isi'
        ];
    }
}
