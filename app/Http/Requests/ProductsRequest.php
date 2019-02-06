<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'price' => 'required',
            'image' => 'image|unique:products,pro_image',
            'home_page' => 'required',
            'available' => 'required',
        ];
    }
}