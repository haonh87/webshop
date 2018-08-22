<?php
/**
 * Created by PhpStorm.
 * User: BOSS
 * Date: 7/25/2018
 * Time: 2:55 AM
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'post_categories_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'content' => 'required'
        ];
    }

    /**
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => __('validation.required', ['attribute' => 'title']),
            'description.required' => __('validation.required', ['attribute' => 'description']),
            'content.required' => __('validation.required', ['attribute' => 'content']),
            'post_categories_id.required' => __('validation.required', ['attribute' => 'post_categories_id'])
        ];
    }
}