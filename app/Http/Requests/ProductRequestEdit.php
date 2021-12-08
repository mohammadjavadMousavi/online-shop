<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequestEdit extends FormRequest
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
            'name' => ['required'],
            'category_id' => ['required','exists:categories,id','integer'],
            'brand_id' => ['required','exists:brands,id','integer'],
            'slug' => ['required','alpha_dash'],
            'price' => ['required','integer','min:100'],
            'image' => ['nullable','mimes:jpg,png,jpeg,mpeg','min:4','max:1024'],
            'description' => ['required']
        ];
    }
}
