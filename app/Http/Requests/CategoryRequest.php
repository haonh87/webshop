<?php
/**
 * Created by PhpStorm.
 * User: BOSS
 * Date: 7/25/2018
 * Time: 2:55 AM
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:1|max:255',
            'description' => 'required',
        ];
    }

    /**
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => __('validation.required', ['attribute' => 'name']),
            'name.min' => __('validation.min.numeric', ['attribute' => 'name', 'min' => '1']),
            'name.max' => __('validation.max.numeric', ['attribute' => 'name', 'max' => '255']),
            'description.required' => __('validation.required', ['attribute' => 'description']),
        ];
    }
}