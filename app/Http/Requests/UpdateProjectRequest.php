<?php

namespace App\Http\Requests;

use App\Traits\ErrorResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    use ErrorResponse;
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
            'project_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('projects')->ignore($this->route('project'))
            ],
            'description' => 'nullable',
            'start_date' => 'required|date_format:Y-m-d'
        ];
    }
}
