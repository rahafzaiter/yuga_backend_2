<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table='products';
    protected $primaryKey='id';
    protected $fillable=['title','category_id','description','color','collection','price','image','S','M','L','XL','XXL'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function quantity()
    {
        return $this->hasMany(Quantity::class);
    }

    public function stock()
    {
        return $this->hasMany(Stock::class);
    }
}
