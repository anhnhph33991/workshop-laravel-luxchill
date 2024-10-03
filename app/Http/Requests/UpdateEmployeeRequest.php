<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
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
            'first_name' => 'required|max:100',
            'email' => [
                'required', 'email', 'max:150',
                Rule::unique('employees')->ignore($this->route('employee')->id)
            ],
            'date_of_birth' => 'required',
            'salary' => 'required|numeric',
            'last_name' => 'required|max:100',
            'phone' => 'required|numeric',
            'address' => 'required',
            'hire_date' => 'required',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
}
