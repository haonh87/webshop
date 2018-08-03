<?php
/**
 * Created by PhpStorm.
 * User: BOSS
 * Date: 7/25/2018
 * Time: 2:55 AM
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductColorRequest extends FormRequest
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
        $id = $this->route('id');
        if ($id != null)  {
            return [
                'code' => 'required|min:1|max:255|unique:product_colors,id,'.$id,
                'name' => 'required|min:1|max:255|unique:product_colors,id,'.$id
            ];
        } else  {
            return [
                'code' => 'required|min:1|max:255|unique:product_colors',
                'name' => 'required|min:1|max:255|unique:product_colors'
            ];
        }

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
            'name.unique' =>  __('validation.unique', ['attribute' => 'name']),
            'code.required' => __('validation.required', ['attribute' => 'code']),
            'code.min' => __('validation.min.numeric', ['attribute' => 'code', 'min' => '1']),
            'code.max' => __('validation.max.numeric', ['attribute' => 'code', 'max' => '255']),
            'code.unique' => __('validation.unique', ['attribute' => 'code']),
        ];
    }
}