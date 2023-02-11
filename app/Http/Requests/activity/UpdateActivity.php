<?php

namespace App\Http\Requests\activity;

use App\Models\activity;
use Illuminate\Foundation\Http\FormRequest;

class UpdateActivity extends FormRequest
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
        return array_merge(activity::rules() , ['activity_id' => 'required|exists:activities,id']);
    }
}
