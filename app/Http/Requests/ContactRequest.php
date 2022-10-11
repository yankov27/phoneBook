<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:25',
            'email' => 'required|email:rfc,dns|unique:contacts,email|max:50',
            'phone' => 'regex:/^(\+|0)[0-9]+$/',
            'phone' => 'required|unique:contacts,phone|min:3|max:20'        
        ];
    }

    public function messages()
    {
        return[
            'phone.regex' => 'Wrong phone format used. Only numbers allowed.'
        ];
    }
}
