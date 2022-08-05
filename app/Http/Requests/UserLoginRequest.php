<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
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
            'email' => 'bail|required|email',
            'password' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Potrebno je navesti email!',
            'email.email' => 'Email treba biti u ispravnom formatu!',
            'password.required' => 'Potrebno je navesti password!',
        ];
    }
}
