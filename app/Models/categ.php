<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categ extends Model
{
    use HasFactory;
    //call the table if its name not the same as model
    // protected $table='categ';

    protected $fillable=[
        'name',
        'description',
        'price'
    ];
}
