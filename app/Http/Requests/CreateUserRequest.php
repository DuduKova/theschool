<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => 'required|string|max:30',
            'email' => 'required|string|email|max:40|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string|max:7',
            'phone' => 'required|string|max:20',
            'img' => 'required|max:1999'
        ];
    }
}
