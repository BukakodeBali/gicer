<?php

namespace App\Models;
use App\Traits\CreateAndUpdateByTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes, CreateAndUpdateByTrait;
    protected $fillable = ['name', 'description'];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function subcategory()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function setParentIdAttribute($id = 0)
    {
        $this->attributes['parent_id'] = $id;
    }

}
