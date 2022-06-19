<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['month','date','day','employee_id','employee_name','Department','first_in_time','last_out_time','hours_of_work'];
}
