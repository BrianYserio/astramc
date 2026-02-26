<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HrEmployeePosition extends Model
{
    protected $table = "hr_employee_position";

    protected $fillable = [
        'row_id',
        'position_description',
        'isActive'
    ];
}
