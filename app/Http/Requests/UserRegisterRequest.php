<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'firstName' => 'required|max:30',
            'lastName' => 'required|max:30',
            'address' => 'required|max:50',
            'zipCode' => 'bail|required|numeric|',
            'city' => 'bail|required|string|max:30',
            'phoneNumber' => 'bail|required|max:17',
            'email' => 'bail|required|email|unique:users|max:40',
            'password' => 'bail|required|min:6'
        ];
    }
    public function messages()
    {
        return [
            'firstName.required' => 'Potrebno je navesti ime!',
            'firstName.max' => 'Ime mora imati maksimalno 30 znakova',
            'lastName.required' => 'Potrebno je navesti prezime!',
            'lastName.max' => 'Prezime mora imati maksimalno 30 znakova',
            'address.required' => 'Potrebno je navesti adresu!',
            'address.max' => 'Adresa mora imati maksimalno 50 znakova',
            'zipCode.required' => 'Potrebno je navesti poštanski broj!',
            'zipCode.numeric' => 'Poštanski broj mora biti broj',
            'city.required' => 'Potrebno je navesti grad!',
            'city.max' => 'Grad mora imati maksimalno 30 znakova',
            'phoneNumber.required' => 'Potrebno je navesti broj mobitela',
            'phoneNumber.max' => 'Broj mobitela mora imati maksimalno 17 znamenaka',
            'email.required' => 'Potrebno je navesti email adresu',
            'email.unique' => 'Email je već registriran, odaberite drugi',
            'email.max' => 'Email mora imati maksimalno 40 znakova',
            'email.email' => 'Email mora biti ispravno napisan!',
            'password.required' => 'Potrebno je navesti lozinku',
            'password.min' => 'Lozinka mora imati minimalno 6 znakova'
        ];
    }
}
