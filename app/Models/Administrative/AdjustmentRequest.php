<?php

namespace App\Models\Administrative;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdjustmentRequest extends Model
{
    use HasFactory; 

    use SoftDeletes;

    protected $fillable = [
        "arq_no",
        "transaction_date",
        "department_id",
        "nature_of_request",
        "requested_by",
        "prepared_by",
        "benefit",
        "date_created",
        "status",
        "reason_disapproved",
        "reason_cancelled",
        "reference",
        "module"
    ];
}
