<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';

    const STATUS_TRANSFER = 5;

    protected $fillable = ['name', 'period'];

}
