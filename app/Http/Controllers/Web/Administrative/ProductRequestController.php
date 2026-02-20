<?php

namespace App\Http\Controllers\Web\Administrative;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductRequestController extends Controller
{
     public function index() {
        return view('module.Administrative.product-display-request.index');
    }
}
