<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\CompanyList;
use App\Models\HrEmployeePosition;

class EmployeeCredentials
{
    /**
     * Get all employee-related metadata.
     * Returning an associative array makes the data much easier to use.
     */
    public function getCredentials(): array
    {
        return [
            'genders'      => config('hr_credentials.gender'),
            'civil_status' => config('hr_credentials.civil_status'),
            'citizenships' => config('hr_credentials.citizenships'),
            'levels'       => config('hr_credentials.levels'),
            'emp_status'   => config('hr_credentials.employment_status'),
            'companies'    => $this->getCompanyList(),
            'positions'    => $this->getPosition(),
            'locations'    => $this->getLocation(),
            'destinations' => $this->getDestination()
        ];
    }

    private function getCompanyList()
    {
        return CompanyList::where('isActive', 'Yes')->pluck('company_name');
    }

    private function getPosition()
    {
        return HrEmployeePosition::where('isActive', 'Yes')->pluck('position_description');
    }

    private function getLocation()
    {
        return DB::table('hr_employee_assigned_location')
            ->where('isActive', true)
            ->pluck('name');
    }

    private function getDestination()
    {
        // Changed to whereIn to correctly handle the array of types
        return DB::table('astra_branches')
            ->whereIn('bytype', ['Department', 'Branch', 'Sub-department'])
            ->pluck('branch_name');
    }
}
