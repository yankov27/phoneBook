<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required',
            'password' => 'required'  
        ];
    }

    public function getCredentials()
    {
        return $this->only('email', 'password');
    }

    public function messages()
    {
        return[
            'failed' => 'Wrong phone format used. Only numbers allowed.'
        ];
    }
}
