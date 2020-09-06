<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = ['client_id', 'product_id', 'issue_date', 'expired', 'status', 'status_id', 'user_id'];

    public function details()
    {
        return $this->hasMany('App\Models\CertificateDetail', 'certificate_id', 'id');
    }

    public function status_app()
    {
        return $this->belongsTo('App\Models\Status', 'status_id');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'client_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
