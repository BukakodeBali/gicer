<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['number', 'code', 'name', 'description', 'period'];
}
