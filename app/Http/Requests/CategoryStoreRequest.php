<?php

namespace App\Http\Requests;

use App\Models\Category;
use Urameshibr\Requests\FormRequest;

class CategoryStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('create category');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'nullable',
            'parent_id' => [
                'required',
                function ($attribute, $value, $fail) {
                    if ($value != 0 && !is_null($value) && $value != '') {
                        $parent = Category::find($value);
                        if (!$parent) {
                            $fail('The '.$attribute.' is invalid.');
                        }
                    }
                },
            ],
            'image' => 'nullable|mimes:jpg,png,jpeg|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama kategori wajib isi',
            'image.mimes' => 'Tipe gambar tidak valid',
            'image.max' => 'Maksimal ukuran gambar 2MB',
        ];
    }

    public function getParent()
    {
        return Category::find($this->parent_id);
    }
}
