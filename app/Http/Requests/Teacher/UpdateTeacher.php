<?php

namespace App\Http\Requests\Teacher;

use App\Models\teacher;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacher extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return array_merge(teacher::rules(),['teacher_id'=>'required|exists:teachers,id']);
    }
}
