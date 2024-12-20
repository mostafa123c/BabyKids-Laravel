<?php

namespace App\Http\Requests\course;

use App\Models\course;
use Illuminate\Foundation\Http\FormRequest;

class AddCourse extends FormRequest
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

             return array_merge(course::rules() ,[
                 'image' => 'required',
             ]);
    }
}
