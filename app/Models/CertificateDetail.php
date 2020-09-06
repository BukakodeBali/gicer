<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class CertificateDetail extends Model
{
    protected $table = 'certificates_details';

    protected $fillable = ['certificate_id', 'status_id', 'issue_date', 'is_active'];

    public function certificate()
    {
        return $this->belongsTo('App\Models\Certificate', 'certificate_id');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id');
    }
}
