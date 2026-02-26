<?php

namespace App\Http\Controllers\Web\Administrative;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CorrectiveRequestController extends Controller
{
    public function index() {
        return view('module.Administrative.corrective-action-request.index');
    }

    public function create() {
        return view('module.Administrative.corrective-action-request.create');
    }

}
