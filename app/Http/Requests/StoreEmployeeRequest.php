<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // Personal Background
            'firstName'          => ['required', 'string', 'max:100'],
            'middleName'         => ['nullable', 'string', 'max:100'],
            'lastName'           => ['required', 'string', 'max:100'],
            'birthdate'          => ['required', 'date', 'before:today'],
            'gender'             => ['required', 'string'],
            'civil_status'       => ['required', 'string'],
            'citizenship'        => ['required', 'string'],
            'contactNumber'      => ['required', 'string', 'max:20'],
            'email'              => ['required', 'email', 'unique:employees,email'],
            'caddress'           => ['required', 'string', 'max:500'],
            'profile_image'      => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],

            // Employment Information
            'date_hired'         => ['required', 'date'],
            'company'            => ['required', 'string'],
            'destination'        => ['required', 'string'],
            'level'              => ['required', 'string'],
            'position'           => ['required', 'string'],
            'sub_designation'    => ['nullable', 'string'],
            'employment_status'  => ['nullable', 'required', 'string'],
            'date_status'        => ['nullable', 'date'],
            'assigned_location'  => ['required', 'string'],

            // Leave Credits (auto-set to 0 on create, readonly in form)
            'vl'                 => ['nullable', 'numeric', 'min:0'],
            'sl'                 => ['nullable', 'numeric', 'min:0'],
            'bl'                 => ['nullable', 'numeric', 'min:0'],
            'el'                 => ['nullable', 'numeric', 'min:0'],
            'ml'                 => ['nullable', 'numeric', 'min:0'],
            'pl'                 => ['nullable', 'numeric', 'min:0'],

            // Government IDs
            'pagibigNumber'      => ['nullable', 'string', 'max:50'],
            'philhealthNumber'   => ['nullable', 'string', 'max:50'],
            'sssNumber'          => ['nullable', 'string', 'max:50'],
            'tinNumber'          => ['nullable', 'string', 'max:50'],

            // Work Schedule
            'work_days'          => ['nullable', 'array'],
            'work_days.*'        => ['string', 'in:monday,tuesday,wednesday,thursday,friday,saturday,sunday'],
            'time_in'            => ['nullable', 'array'],
            'time_in.*'          => ['nullable', 'date_format:H:i'],
            'time_out'           => ['nullable', 'array'],
            'time_out.*'         => ['nullable', 'date_format:H:i'],
        ];
    }

    public function messages(): array
    {
        return [
            'firstName.required'         => 'First name is required.',
            'lastName.required'          => 'Last name is required.',
            'email.unique'               => 'This email is already registered.',
            'birthdate.before'           => 'Birthdate must be before today.',
            'profile_image.max'          => 'Profile image must not exceed 2MB.',
        ];
    }
}
