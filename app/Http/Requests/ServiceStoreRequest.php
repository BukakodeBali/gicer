<?php

namespace App\Http\Requests;

use App\Traits\CreateLinkAndMetaTrait;
use Urameshibr\Requests\FormRequest;

class ServiceStoreRequest extends FormRequest
{
    use CreateLinkAndMetaTrait;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('create service');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'link' => 'nullable',
            'meta_description' => 'nullable',
            'image' => 'nullable|image:mimes:jpg,png,jpeg|max:2048',
            'content'=> 'required'
        ];
    }

    public function getArticleLink():string
    {
        return $this->createLink($this->link, $this->title);
    }

    public function getMetaDescription():string
    {
        return $this->createMeta($this->meta_description, $this->content);
    }
}
