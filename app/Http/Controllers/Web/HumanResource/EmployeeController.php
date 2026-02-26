<?php

namespace App\Http\Controllers\Web\HumanResource;

use App\Http\Controllers\Controller;
use App\Models\CompanyList;
use App\Models\HrEmployee;
use App\Models\HrEmployeePosition;
use Illuminate\Http\Request;
use App\Http\Controller\Action\AddEmployeeAction;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index() {
        return view('module.human-resource.employees.index');
    }

    public function create() {
        $genders = ['Male', 'Female', 'Others'];
        $status = ['Single', 'Married'];
        $citizenship = ['Filipino'];
        $companies = CompanyList::where('isActive', 'Yes')
                ->pluck('company_name');
        $positions = HrEmployeePosition::where('isActive', 'Yes')
                ->pluck('position_description');
        $locations = DB::table('hr_employee_assigned_location') //using db facade no model needed
                ->where('isActive', true)
                ->pluck('name');
        $destinations = DB::table('astra_branches')
                ->where('bytype', ['Department', 'Branch', 'Sub-department'])
                ->pluck('branch_name');

        return view('module.human-resource.employees.create',
            compact('genders', 'status', 'citizenship','companies','positions', 'locations', 'destinations'));
    }

    public function store(
            AddEmployeeAction $action,
            CreateEmployeeRequest $request
        ) {
        $action->execute($request);

        // 2. Redirect back with a success message
    return redirect()
        ->route('employees.index') // Or wherever your list view is
        ->with('success', 'Employee has been added successfully!');
    }

    public function show() {

    }
}
