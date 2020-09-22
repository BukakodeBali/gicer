<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    use SoftDeletes;
    protected $table = 'feedbacks';
    protected $fillable = ['client_id', 'feedback'];

    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'client_id');
    }
}
