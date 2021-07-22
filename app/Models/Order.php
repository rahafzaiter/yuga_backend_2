<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='orders';
    protected $primaryKey='id';
    protected $fillable=['date','customer_id','customer_name','street','city','floor','building','total_price'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
