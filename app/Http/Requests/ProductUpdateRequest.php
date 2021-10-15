<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProductUpdateRequest extends FormRequest
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
            'name' => 'string',
            'brand' => 'nullable|string',
            'season' => 'nullable|string',
            'material' => 'nullable|string',
            'description' => 'string',
            'seo_text' => 'string',
            'slug' => 'nullable|string',
            'sku' => 'unique:products,sku',
            'tags' => 'nullable|string',
            'dimension' => 'nullable|string',
            'weight' => 'nullable|string',
            'selling_price' => 'integer',
            'discounted_price' => 'nullable|integer',
        ];
    }
}
