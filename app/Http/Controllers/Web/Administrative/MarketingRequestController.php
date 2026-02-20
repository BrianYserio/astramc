<?php

namespace App\Http\Controllers\Web\Administrative;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MarketingRequestController extends Controller
{
    public function index() {
        return view('module.Administrative.marketing-service-request.index');
    }
}
