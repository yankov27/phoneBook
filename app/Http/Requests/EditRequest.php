<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'email' => 'required|unique:contacts,email|max:50',
            'email' => 'email:rfc,dns',
            'phone' => 'required|unique:contacts,phone|min:4|max:20',
            'phone' => 'regex:/^(\+|0)[0-9]+$/'            
        ];
    }

    public function messages()
    {
        return[
            'phone.regex' => 'Wrong phone format used. Only numbers allowed.'
        ];
    }
}
