<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Contracts\Validation\Validator;

use App\Models\Enums\TaskStatus;

class CreateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // As there's no authorization in the app, keep it simple
        // NOTE: change if there's gonna be auth proccess
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => ["required", "string", "min:1", "max:20"],
            "description" => ["required", "string", "max:1000"],
            "status" => ["required", "integer", Rule::in(array_column(TaskStatus::cases(), "value"))]
        ];
    }

    public function failedValidation(Validator $validator)
    {        
        throw new HttpResponseException(response()->json([
            "errors" => $validator->errors()
        ], 422));
    }
}
