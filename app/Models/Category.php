<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable =[
        'cat_name',
        'cat_des',
        'cat_image',
        'status',
        'cat_status'
    ];
}
 