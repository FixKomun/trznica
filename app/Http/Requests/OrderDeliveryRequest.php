<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderDeliveryRequest extends FormRequest
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
            'address' => 'required|max:50',
            'zipCode' => 'bail|required|numeric|',
            'country' => 'bail|required|string|max:30',
            'city' => 'bail|required|string|max:30',
        ];
    }
    public function messages()
    {
        return [
            'address.required' => 'Potrebno je navesti adresu dostave',
            'address.max' => 'Maksimalan broj znakova adrese je 50',
            'zipCode.required' => 'Potrebno je navesti poštanski broj!',
            'zipCode.numeric' => 'Poštanski broj mora biti broj',
            'country.required' => 'Potrebno je navesti državu dostave',
            'country.max' => 'Maksimalan broj znakova države je 30',
            'city.required' => 'Potrebno je navesti grad!',
            'city.max' => 'Grad mora imati maksimalno 30 znakova',
        ];
    }
}
