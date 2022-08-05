<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|max:70',
            'price' => 'required|numeric|max:10000',
            'category_id' => 'required',
            'description' => 'required|max:500',
            'image' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "Potrebno je navesti ime!",
            'price.required' => "Potrebno je navesti cijenu!",
            'price.numeric' => "Cijena mora biti broj!",
            'price.max' => "Maksimalna cijena je 10000kn",
            'category_id.required' => "Potrebno je odabrati kategoriju!",
            'image.required' => "Potrebno je postaviti sliku",
        ];
    }
}
