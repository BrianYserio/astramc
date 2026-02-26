<?php

namespace App\Http\Controllers\Action;

use App\Model\HrEmployee;
use App\Http\Controller\Action;
use Illuminate\Foundation\Http\FormRequest;

class AddEmployeeAction {

    public function execute(Request $request) {
        // In Controller

        HrEmployee::create([
        // Personal Background
            'firstname'   => $request->input('firstName'),
            'middlename'  => $request->input('middleName'),
            'lastname'    => $request->input('lastName'),
            'gender'      => $request->input('gender'),
            'status'      => $request->input('status'),
            'citizenship' => $$request->input('citizenship'),
            'birthdate'   => $request->input('birthdate'),
            'contact_no'  => $request->input('contactNumber'),
            'email'       => $request->input('email'),
            'caddress'    => $request->input('caddress'),

        // Employment Information

            'date_hired'   => $data['date_hired'],
        ]);
    }
}
