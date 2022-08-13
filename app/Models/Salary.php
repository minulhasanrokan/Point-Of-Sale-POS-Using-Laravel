<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'user_id',
        'salary',
        'address',
        'advance_salary',
        'month',
        'year',
        'status',
        'salary_status'
    ];
}
 