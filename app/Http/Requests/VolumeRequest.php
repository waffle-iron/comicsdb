<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VolumeRequest extends FormRequest
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
            'name' => 'required',
            'year' => 'required',
            'publisher_id' => 'required'
        ];
    }

    /**
     * Set custom validation messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'The name is required',
            'year.required' => 'The year is required'
        ];
    }
}
