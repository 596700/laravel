<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProduct extends FormRequest
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
            'name' => ['required', 'regex:/^[a-zA-Z0-9_- ]+$/u', 'unique:products'],
            'vendor_url' => ['required', 'active_url'],
            'part' => [
                'required',
                Rule::in(['Hardware', 'Operating System', 'Application'])
            ],
        ];
    }
}
