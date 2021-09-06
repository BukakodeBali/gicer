<?php

namespace App\Models;

use App\Traits\CreateAndUpdateByTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Article extends Model
{
    use CreateAndUpdateByTrait;
    protected $fillable = ['title', 'content'];

    public function link():MorphOne
    {
        return $this->morphOne(Link::class, 'linkable');
    }

    public function image():MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function categories():BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'article_categories', 'article_id', 'category_id');
    }

    public function tags():BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'article_tags', 'article_id', 'tag_id');
    }
}
