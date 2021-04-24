<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProduct extends FormRequest
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
            // Rule::unique('products')->ignore($this->id)
            'name' => ['required', 'regex:/^[a-zA-Z0-9\-_ ]+$/u'],
            'vendor_url' => ['required', 'active_url'],
            'part' => [
                'required',
                Rule::in(['Hardware', 'Operating System', 'Application'])
            ],
        ];
    }
}
