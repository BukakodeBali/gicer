<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scope extends Model
{
    use SoftDeletes;

    protected $fillable = ['code', 'name', 'description'];

    protected $hidden = ['deleted_at'];

    public function clients()
    {
        return $this->hasMany('App\Models\Client', 'scope_id', 'id');
    }
}
