<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->role === 'ADMIN';
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
            'category_id' => 'required|integer',
            'subcategory_id' => 'required|integer',
            'subsubcategory_id' => 'nullable|integer',
            'product_family_id' => 'nullable|integer',
            'brand' => 'nullable|string',
            'season' => 'nullable|string',
            'material' => 'nullable|string',
            'description' => 'nullable|string',
            'seo_text' => 'string',
            'slug' => 'nullable|string',
            'sku' => 'unique:products,sku',
            'tags' => 'nullable|string',
            'dimension' => 'nullable|string',
            'weight' => 'nullable|string',
            'selling_price' => 'required|integer',
            'discounted_price' => 'nullable|integer',
        ];
    }
}
