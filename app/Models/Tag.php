<?php

namespace App\Models;

use App\Traits\CreateAndUpdateByTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes, CreateAndUpdateByTrait;
    protected $fillable = ['name'];
}
