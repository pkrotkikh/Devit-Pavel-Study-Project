<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TweetUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "text" => "required|string|max:280",
        ];
    }

    public function messages()
    {
        return [
            "text.required" => __("locale.tweet.validation.text.required"),
            "text.string" => __("locale.tweet.validation.text.string"),
            "text.max" => __("locale.tweet.validation.text.max"),
        ];
    }
}
