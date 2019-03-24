<?php

namespace App\Http\Requests;

use App\Task;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateTask extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3|max:150',
            'user_id' => 'required|exists:users,id',
            'priority' => ['required', Rule::in([Task::LOW_PRIORITY, Task::MEDIUM_PRIORITY, Task::HIGH_PRIORITY])]
        ];
    }
}
