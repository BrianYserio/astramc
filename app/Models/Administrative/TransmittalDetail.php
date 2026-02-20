<?php

namespace App\Models\Administrative;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransmittalDetail extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        "trm_no",
        "details",
        "reference",
        "quantity",
        "remarks"
    ];

}
