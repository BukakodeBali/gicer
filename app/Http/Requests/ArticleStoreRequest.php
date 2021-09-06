<?php

namespace App\Http\Requests;

use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Urameshibr\Requests\FormRequest;

class ArticleStoreRequest extends FormRequest
{
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
    public function rules()
    {
        return [
            'title' => 'required',
            'link' => 'nullable',
            'meta_description' => 'nullable',
            'image' => 'nullable|image:mimes:jpg,png,jpeg|max:2048',
            'content'=> 'required',
            'tags' => 'nullable|array',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id'
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
            'title.required' => 'Judul artikel wajib isi',
            'content.required' => 'Konten waji isi'
        ];
    }

    public function getArticleLink():string
    {
        $link = $this->link ?? null;
        if ($link === null || $link === '') {
            return Str::slug($this->title, '-');
        }

        return  $link;
    }

    public function getMetaDescription():string
    {
        $meta = $this->meta_description ?? null;
        if ($meta === null || $meta === '') {
            $meta = strip_tags($this->content);
            $meta = str_replace(["\n", "\r", "\t"], ' ', $meta);
            return preg_replace('/\s+?(\S+)?$/', '', substr($meta, 0, 150));
        }

        return $meta;
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
