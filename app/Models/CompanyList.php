<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyList extends Model
{
    protected $fillable = [
        'company_name',
        'code',
        'caddress',
        'contact_no',
        'contact_email',
        'type',
        'tin',
        'contact_person',
        'isActive',
    ];

    protected $table = 'company_lists';
}
