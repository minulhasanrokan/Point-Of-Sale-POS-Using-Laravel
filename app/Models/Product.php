<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =[
        'product_name',
        'cat_id',
        'supplier_id',
        'product_code',
        'product_place',
        'product_route',
        'product_image',
        'buy_date',
        'expire_date',
        'buying_price',
        'sale_price',
        'product_des',
        'status',
        'product_status'
    ];
}
