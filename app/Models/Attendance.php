<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'att_date',
        'edit_date',
        'att_year',
        'attendance',
        'status',
        'att_status'
    ];

    public function AttendancerelatedUser(){
        return $this->hasOne("App\Models\create_employes_table","id","user_id");
    }
}
