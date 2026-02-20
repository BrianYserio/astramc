<?php

namespace App\Models\Administrative;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class Transmittal extends Model
{
    use HasFactory; 

    use SoftDeletes;

    protected $fillable = [
        'trn_no',
        'prepared_by',
        'sender',
        'recipient',
        'date_created',
        'subject',
        'others',
        'checked_by',
        'approved_by',
        'received_by',
        'date_received',
        'remarks',
        'status',
        'cancelled_reason',
        'cancelled_by',
    ];

    public function preparedBy()
    {
        return $this->belongsTo(User::class, 'prepared_by');
    }

    public function receivedBy()
    {
        return $this->belongsTo(User::class, 'received_by');
    }
}
