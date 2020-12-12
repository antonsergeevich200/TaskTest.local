<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductCategoryUpdateRequest extends FormRequest
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
}
