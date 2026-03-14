<?php

namespace App\Http\Requests;

use App\Models\Enums\TaskStatus;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTaskRequest extends FormRequest
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
            "title" => "sometimes|string|min:1|max:20",
            "description" => "sometimes|string|max:1000",
            "status" => ["sometimes", "integer", Rule::in(array_column(TaskStatus::cases(), "value"))]
        ];
    }
}
