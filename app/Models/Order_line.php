<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_line extends Model
{
    use HasFactory;
    protected $fillable=[
        'quantity',
        'price',
        'order_id',
        'product_id'
    ]
}
