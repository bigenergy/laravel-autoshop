<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'name' => 'required|max:255',
            'categories' => 'required|max:255',
            'description' => 'required|max:255',
            'disable' => 'required',
            'sort' => 'required',
            'brand_id' => 'required',
            'images' => 'max:5',
            'slug' => 'required|unique:products'
        ];
    }
}
