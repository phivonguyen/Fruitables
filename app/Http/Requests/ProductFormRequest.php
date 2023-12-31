<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'category_id' => [
                'required',
                'integer',
            ],
            'name' => [
                'required',
                'string'
            ],
            'slug' => [
                'required',
                'string',
                'max:225'
            ],
            'origin' => [
                'required',
                'string',
                'max:225'
            ],
            'description' => [
                'required',
                'string'
            ],
            'original_price' => [
                'required',
                'integer'
            ],
            'selling_price' => [
                'required',
                'integer',
                'lt:original_price', // Ensure selling_price is less than original_price
            ],
            'quantity' => [
                'required',
                'integer'
            ],
            'trending' => [
                'nullable',

            ],
            'featured' => [
                'nullable',
            ],
            'status' => [
                'nullable',

            ],
            'meta_title' => [
                'required',
                'string',
                'max:225'
            ],
            'meta_keyword' => [
                'required',
                'string',

            ],
            'meta_description' => [
                'required',
                'string',

            ],
            'image' =>[
                'nullable',
                // 'image|mines:jpeg,png,png,jpg,webp'
            ]
        ];
    }
}
