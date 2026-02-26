<?php

namespace App\Http\Controllers\Web\administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserLogController extends Controller
{
    public function index() {
        return view('module.administrator.user-logs.index');
    }
}
