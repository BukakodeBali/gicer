<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Link extends Model
{
    protected $fillable = ['meta_description', 'link'];

    public function linkable():MorphTo
    {
        return $this->morphTo();
    }
}
