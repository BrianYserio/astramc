<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'firstName'     => 'required|string|max:255',
            'middleName'    => 'nullable|string|max:255', // Usually middle name is optional
            'lastName'      => 'required|string|max:255',
            'gender'        => 'required|string|in:Male,Female,Others',
            'status'        => 'required|string', // e.g., Single, Married
            'citizenship'   => 'required|string|max:100',
            'birthdate'     => 'required|date|before:today',
            'contactNumber' => 'required|string|min:10|max:20',
            'email'         => 'required|email|unique:hr_employees,email',
            'caddress'      => 'required|string|max:500', // Current Address
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
        ];
    }
}
