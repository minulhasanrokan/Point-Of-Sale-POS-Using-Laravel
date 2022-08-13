<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class create_employes_table extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'email',
        'phone',
        'address',
        'experience',
        'photo',
        'salary',
        'vacation',
        'nid_no',
        'status',
        'employee_status'
    ];
}