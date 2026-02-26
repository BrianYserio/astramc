<?php

namespace App\Http\Controllers\Web\administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserAccountController extends Controller
{
    public function index() {
        return view('module.administrator.user-accounts.index');
    }

    public function create() {
        return view('module.administrator.user-accounts.create');
    }

    public function store() {

    }

    public function show() {

    }
}
