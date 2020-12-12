<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductCategoryCreateRequest extends FormRequest
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
            'title'         => 'required|min:5|max:200|unique:product_categories',
            'slug'          => 'max:200||unique:product_categories',
            'description'   => 'string|max:500|min:3',
            'parent_id'     => 'required|integer|exists:product_categories,id',
        ];
    }

    /**
    * Get the error messages for the defined validation rules.
    *
    * @return array
    */
    public function messages()
    {
        return [
            'title.required'    => 'Enter field title',
            'description.min'   => 'Minimum article length [:min] characters',
        ];
    }

    /**
    * Get custom attributes for validator errors.
    *
    * @return array
    */
    public function attributes()
    {
        return [
            'title' =>  'Title',
        ];
    }
}
