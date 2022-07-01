<?php

namespace App\Http\Requests\Api\Tweet;

use Illuminate\Foundation\Http\FormRequest;

class TweetRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "parent_id" => "integer|exists:tweets,id",
            "retweet_id" => "integer|exists:tweets,id",
            "text" => "required|string|max:280",
        ];
    }

    public function messages()
    {
        return [
            "parent_id.integer" => __("locale.tweet.validation.parent_id.integer"),
            "parent_id.exists" => __("locale.tweet.validation.parent_id.exists"),

            "retweet_id.integer" => __("locale.tweet.validation.retweet_id.integer"),
            "retweet_id.exists" => __("locale.tweet.validation.retweet_id.exists"),

            "text.required" => __("locale.tweet.validation.text.required"),
            "text.string" => __("locale.tweet.validation.text.string"),
            "text.max" => __("locale.tweet.validation.text.max"),
        ];
    }
}
