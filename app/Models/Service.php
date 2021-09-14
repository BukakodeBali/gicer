<?php

namespace App\Models;

use App\Traits\CreateAndUpdateByTrait;
use App\Traits\LinkableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Service extends Model
{
    use CreateAndUpdateByTrait, LinkableTrait;
    protected $fillable = ['title', 'content'];

    public function link():MorphOne
    {
        return $this->morphOne(Link::class, 'linkable');
    }

    public function image():MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
