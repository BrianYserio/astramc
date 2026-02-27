<?php

namespace App\Http\Controllers\Web\HumanResource;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Services\EmployeeCredentials;
use App\Services\EmployeeIdGenerator;

class EmployeeController extends Controller
{
    public function index() {
        return view('module.human-resource.employees.index');
    }

    public function create(EmployeeCredentials $service) {  // use service for clearer and maintainable

        $employeeIdPreview = EmployeeIdGenerator::generate();
        $credentials = $service->getCredentials();

        return view('module.human-resource.employees.create', [
            'employeeIdPreview' => $employeeIdPreview,
            'credentials'       => $credentials
        ]);
    }

    public function store (StoreEmployeeRequest $request) {
        dd($request->all());
    }

    public function show() {

    }


}
