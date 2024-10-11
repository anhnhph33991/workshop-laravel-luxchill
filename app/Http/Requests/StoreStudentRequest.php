<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            // classroom
            'student.name' => 'required|string|max:255',
            ## 'student.email' => 'required|email|unique:students',
            'student.email' => 'required|email',
            'student.classroom_id' => 'required|exists:classrooms,id',

            // passport
            'passport.passport_number' => 'required|numeric|max_digits:12',
            'passport.issued_date' => 'required|date_format:Y-m-d',
            'passport.expiry_date' => [
                'required',
                'date_format:Y-m-d',
                function ($attribute, $value, $fail) {
                    $issuedDate = $this->input('passport.issued_date');
                    if (
                        $issuedDate &&
                        Carbon::parse($value)->diffInYears(Carbon::parse($issuedDate)) < 2
                    ) {
                        $fail('The expiry date must be at least 2 years after the issued date.');
                    }
                }
            ],

            // subject
            'subjects' => 'required|array|min:1'
        ];
    }

    public function attributes()
    {
        return [
            'student.name'                  => 'name',
            'student.email'                 => 'email',
            'student.classroom_id'          => 'classroom',

            //
            'passport.passport_number'      => 'passport_number',
            'passport.issued_date'          => 'issued_date',
            'passport.expiry_date'          => 'expiry_date',
        ];
    }
}
