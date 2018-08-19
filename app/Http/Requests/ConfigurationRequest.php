<?php
/**
 * Created by PhpStorm.
 * User: BOSS
 * Date: 08/08/2018
 * Time: 00:05 AM
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfigurationRequest extends FormRequest
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
                'name' => 'required|min:1|max:255|unique:configurations,id,' . $id,
                'value' => 'required|min:1|max:255|unique:configurations,id,' . $id,
            ];
        } else {
            return [
                'name' => 'required|min:1|max:255|unique:configurations',
                'value' => 'required|min:1|max:255|unique:configurations',
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
            'value.required' => __('validation.required', ['attribute' => 'name']),
            'value.min' => __('validation.min.numeric', ['attribute' => 'name', 'min' => '1']),
            'value.max' => __('validation.max.numeric', ['attribute' => 'name', 'max' => '255']),
        ];
    }
}