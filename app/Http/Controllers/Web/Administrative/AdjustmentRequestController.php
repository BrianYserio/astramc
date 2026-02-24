<?php

namespace App\Http\Controllers\Web\Administrative;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdjustmentRequestController extends Controller
{
    public function index() {
        // $adjustment_request = AdjustmentRequest::select(['id', 'arq_no', '', '', '', '', 'date_created', 'status'])->get();
        return view('module.Administrative.adjustment-request.index');
    }

    public function create() {
        return view('module.Administrative.adjustment-request.partial.index');
    }

    public function store() {

    }
}
