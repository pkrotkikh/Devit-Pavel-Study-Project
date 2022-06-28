<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ApiLoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            "email.required" => __("locale.auth.validation.email.required"),
            "email.string" => __("locale.auth.validation.email.string"),
            "email.email" => __("locale.auth.validation.email.email"),

            "password.required" => __("locale.auth.validation.password.required"),
            "password.string" => __("locale.auth.validation.password.string"),
        ];
    }
}
