<?php
declare(strict_types = 1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class IssueRequest
 *
 * @package App\Http\Requests
 * @author Maik Pütz <maikpuetz@gmail.com>
 */
class IssueRequest extends FormRequest
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
            'volume_id' => 'required',
            'number' => 'required',
            'store_date' => 'required'
        ];
    }
}
