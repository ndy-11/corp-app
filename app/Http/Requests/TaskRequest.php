<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class TaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() != null;
    }
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:200',
            'description' => 'nullable|string',
            'assignee_id' => 'nullable|exists:users,id',
            'status' => 'required|in:todo,in_progress,review,done',
            'priority' => 'required|in:low,medium,high',
            'due_date' => 'nullable|date',
        ];
    }
}
