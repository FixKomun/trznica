<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderUserRequest extends FormRequest
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
            'email' => 'bail|required|email|max:40',
            'phoneNumber' => 'required|max:17'
        ];
    }
    public function messages()
    {
        return [
            'firstName.required' => 'Potrebno je navesti ime!',
            'firstName.max' => 'Ime može imati maksimalno 30 znakova',
            'lastName.required' => 'Potrebno je navesti prezime!',
            'lastName.max' => 'Prezime može imati maksimalno 30 znakova',
            'email.required' => 'Potrebno je navesti email adresu!',
            'email.email' => 'Email mora biti ispravno napisan',
            'email.max' => 'Email može imati maksimalno 40 znakova',
            'phoneNumber.required' => 'Broj mobitela mora biti naveden!',
            'phoneNumber.max' => 'Maksimalan broj znamenki mobitela je 17'
        ];
    }
}
