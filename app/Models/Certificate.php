<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Certificate extends Model
{
    const STATUS_ACTIVE = 'Active';
    const STATUS_SUSPEND = 'Suspend';
    const STATUS_WITHDRAW = 'Withdraw';
    const STATUS_EXPIRED = 'Expired';

    protected $fillable = [
        'client_id',
        'product_id',
        'issue_date',
        'expired',
        'original_date',
        'status',
        'hash',
        'status_id',
        'user_id',
        'e_code',
        'nace_code',
        'scope_name',
    ];

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

    public function getQrCodeAttribute(): string
    {
        if (Storage::disk('local')->exists('certificates/'.$this->id.'.PNG')) {
            return Storage::disk('local')->get('certificates/'.$this->id.'.PNG');
        }

        return '';
    }
}
