<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HrEmployee extends Model
{
    use HasFactory;

    protected $table = 'hr_employees';

    protected $fillable = [

        // Basic Information
        'employee_id',
        'firstname',
        'middlename',
        'lastname',
        'birthdate',
        'gender',
        'civil_status',
        'citizenship',
        'contact_no',
        'email',
        'caddress',

        // Employment Info
        'date_hired',
        'position',
        'basic_salary',
        'emp_status',
        'date_status',

        // Leave Balances
        'previous_year_remaining_vl',
        'carry_over_vl',
        'vl',
        'sl',
        'bl',
        'el',
        'ml',
        'pl',
        'spl',
        'paid_vl',
        'update_leaves_status',
        'additional_leaves_status',

        // Government IDs
        'pagibig',
        'philhealth',
        'sss',
        'tin',

        // Company Info
        'company',
        'branch',
        'sub_branch',
        'assigned_location',

        // Permissions
        'custom_permissions',

        // System
        'prepared_by',
        'isActive',
    ];

    protected $casts = [

        'birthdate' => 'date',
        'date_hired' => 'date',
        'date_status' => 'date',

        'basic_salary' => 'decimal:2',

        'previous_year_remaining_vl' => 'decimal:2',
        'carry_over_vl' => 'decimal:2',
        'vl' => 'decimal:2',
        'sl' => 'decimal:2',
        'bl' => 'decimal:2',
        'el' => 'decimal:2',
        'ml' => 'decimal:2',
        'pl' => 'decimal:2',
        'spl' => 'decimal:2',
        'paid_vl' => 'decimal:2',

        'update_leaves_status' => 'boolean',
        'additional_leaves_status' => 'boolean',
        'isActive' => 'boolean',

        'custom_permissions' => 'array',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function preparedBy()
    {
        return $this->belongsTo(User::class, 'prepared_by');
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    public function getFullNameAttribute()
    {
        return trim("{$this->firstname} {$this->middlename} {$this->lastname}");
    }

}
