<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    protected $fillable = ['path', 'name', 'is_primary'];
    public $timestamps = false;

    public function imageable():MorphTo
    {
        return $this->morphTo();
    }
}
