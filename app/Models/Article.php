<?php

namespace App\Models;

use App\Traits\CreateAndUpdateByTrait;
use App\Traits\LinkableTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Article extends Model
{
    use CreateAndUpdateByTrait, LinkableTrait;
    protected $fillable = ['title', 'content', 'status', 'published_at'];
    public $appends = ['formatted_published_at'];

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

    public function getFormattedPublishedAtAttribute()
    {
        return $this->published_at !== null ? Carbon::parse($this->published_at)->toFormattedDateString() : '';
    }

    public function scopeLatestData($query)
    {
        return $query->with(['link', 'image', 'categories'])
            ->whereStatus('published')
            ->limit(6)
            ->orderByDesc('id');
    }
}
