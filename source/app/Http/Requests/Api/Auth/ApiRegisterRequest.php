<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ApiRegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ];
    }

    public function messages()
    {
        return [
            "name.required" => __("locale.register.validation.name.required"),
            "name.string" => __("locale.register.validation.name.string"),
            "name.max" => __("locale.register.validation.name.max"),

            "email.required" => __("locale.register.validation.email.required"),
            "email.string" => __("locale.register.validation.email.string"),
            "email.email" => __("locale.register.validation.email.email"),
            "email.max" => __("locale.register.validation.email.max"),
            "email.unique" => __("locale.register.validation.email.unique"),

            "password.required" => __("locale.register.validation.password.required"),
            "password.string" => __("locale.register.validation.password.string"),
            "password.min" => __("locale.register.validation.password.min"),
        ];
    }
}
