<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    protected $fillable = ['code', 'scope_id', 'name', 'ecode', 'nace_code', 'pic', 'email', 'phone', 'address', 'user_id', 'password', 'client_hash'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function scope()
    {
        return $this->belongsTo('App\Models\Scope', 'scope_id')->withTrashed();
    }

    public function certificates()
    {
        return $this->hasMany('App\Models\Certificate', 'client_id', 'id');
    }
}
