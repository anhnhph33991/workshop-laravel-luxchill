<?php

namespace App\Http\Requests;

use App\Traits\ErrorResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTaskRequest extends FormRequest
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
            'task_name'     => 'required|string|max:255',
            'description'   => 'nullable',
            'status'        => [
                'required',
                Rule::in(['Chưa bắt đầu', 'Đang thực hiện', 'Đã hoàn thành'])
            ]
        ];
    }
}
