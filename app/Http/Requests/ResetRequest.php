<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetRequest extends FormRequest
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
            'token' => 'required',
            'password' => 'bail|required|max:30|min:6',
            'passwordRepeat' => 'bail|required|max:30|same:password|min:6'
        ];
    }
    public function messages()
    {
        return [
            'password.required' => 'Potrebno je navesti lozinku',
            'password.max' => 'Lozinka mora imati maksimalno 30 znakova',
            'passwordRepeat.required' => 'Potrebno je navesti potvrdu lozinke',
            'passwordRepeat.max' => 'Lozinka mora imati maksimalno 30 znakova',
            'passwordRepeat.same' => 'Lozinka i potvrda lozinke moraju podudarati!',
            'password.min' => 'Lozinka mora imati minimalno 6 znakova',
            'passwordRepeat.min' => 'Lozinka mora imati minimalno 6 znakova'
        ];
    }
}
