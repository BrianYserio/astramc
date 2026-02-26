<?php

namespace App\Http\Controllers\Web\HumanResource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index() {
        return view('module.human-resource.employees.index');
    }

    public function create() {
        return view('module.human-resource.employees.create');
    }

    public function show() {
        
    }
}
