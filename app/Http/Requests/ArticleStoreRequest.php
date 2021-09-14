<?php

namespace App\Http\Requests;

use App\Models\Tag;
use App\Traits\CreateLinkAndMetaTrait;
use Illuminate\Support\Facades\Auth;
use Urameshibr\Requests\FormRequest;

class ArticleStoreRequest extends FormRequest
{
    use CreateLinkAndMetaTrait;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('create article');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'link' => 'nullable',
            'meta_description' => 'nullable',
            'image' => 'nullable|image:mimes:jpg,png,jpeg|max:2048',
            'content'=> 'required',
            'tags' => 'nullable|array',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
            'status' => 'required|in:draft,published'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Judul artikel wajib isi',
            'content.required' => 'Konten waji isi',
            'status.required' => 'Status wajib isi'
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

    public function getTags():array
    {
        $tags = [];
        foreach ($this->tags as $tagName) {
            $tag = Tag::where('name', $tagName)->first();
            if (!$tag) {
                $tag = Tag::make(['name' => $tagName]);
                $tag->setCreatedBy(Auth::user());
                $tag->setUpdatedBy(Auth::user());
                $tag->save();
            }
            $tags[] = $tag->id;
        }

        return $tags;
    }
}
