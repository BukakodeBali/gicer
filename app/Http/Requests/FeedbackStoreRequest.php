<?php


namespace App\Http\Requests;


use Urameshibr\Requests\FormRequest;

class FeedbackStoreRequest extends FormRequest
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
            'feedback' => 'required|min:8'
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
            'feedback.required' => 'Feedback wajib isi!',
            'feedback.min' => 'Minimal panjang feedback 8 karakter'
        ];
    }
}
