<?php

namespace App\Http\Requests;

use App\Models\faq;
use Illuminate\Foundation\Http\FormRequest;

class UpdateFaqRequest extends FormRequest
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
        return array_merge(faq::rules(),[
            'faq_id'=>'required|exists:faqs,id'
        ]);
    }
}
