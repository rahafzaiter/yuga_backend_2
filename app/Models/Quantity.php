<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quantity extends Model
{
    use HasFactory;
    protected $table='quantity';
    protected $primaryKey='id';
    protected $fillable=['product_id','size','quantity'];
    
    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
