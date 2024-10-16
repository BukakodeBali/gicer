<?php

namespace App\Http\Requests;

use App\Models\Category;
use App\Traits\CreateLinkAndMetaTrait;
use Urameshibr\Requests\FormRequest;

class CategoryUpdateRequest extends FormRequest
{
    use CreateLinkAndMetaTrait;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('update category');
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
            'image' => 'nullable|mimes:jpg,png,jpeg|max:2048',
            'link' => 'nullable',
            'meta_description' => 'nullable'
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

    public function getCategoryLink():string
    {
        return $this->createLink($this->link, $this->name);
    }

    public function getMetaDescription():string
    {
        return $this->createMeta($this->meta_description, $this->description);
    }
}
