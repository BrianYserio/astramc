<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdjustmentRequestDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        "arq_no",
        "employee_id",
        "message"
    ];
}
