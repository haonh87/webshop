<?php
/**
 * Created by PhpStorm.
 * User: BOSS
 * Date: 7/25/2018
 * Time: 2:55 AM
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductSizeRequest extends FormRequest
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
        if ($id != null) {
            return [
                'name' => 'required|min:1|max:255|unique:product_sizes,id,' . $id,
            ];
        } else {
            return [
                'name' => 'required|min:1|max:255|unique:product_sizes',
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
        ];
    }
}