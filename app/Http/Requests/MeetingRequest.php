<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class MeetingRequest extends FormRequest
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
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'location' => 'nullable|string|max:200',
            'participants' => 'nullable|array',
            'participants.*' => 'exists:users,id',
        ];
    }
}
