<?php

namespace App\Traits;

use App\Models\Link;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait LinkableTrait
{
    public function link():MorphOne
    {
        return $this->morphOne(Link::class, 'linkable');
    }
}
