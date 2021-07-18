<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table='categories';
    protected $primaryKey='id';

    //optional:

     //to delete the created at and updated at 
    // protected $timestamps=false;

    // protected $dateFormat='h:m:s';

    protected $fillable=['name'];

    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
