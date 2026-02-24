<?php

namespace App\Http\Controllers\Web\Administrative;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItRequestController extends Controller
{
    public function index() {
        return view('module.Administrative.it-service-request.index');
    }

    public function create() {
        return view('module.Administrative.it-service-request.partial.index');
    }

    public function store() {
        
    }

    public function show() {
        
    }
}
