<?php
declare(strict_types = 1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class PublisherRequest
 *
 * @package App\Http\Requests
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class PublisherRequest extends FormRequest
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
        ];
    }
}
