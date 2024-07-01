<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'      => 'required|string|max:255',
            'position'  => 'required|string|max:255',
            'image'     => 'nullable|mimes:jpg,png|max:2048',
            'facebook'  => 'required|url',
            'linkedin'  => 'required|url',
            'twitter'   => 'required|url',
        ];
    }

    public function attributes(): array
    {
        return [
            'name'      => __("keywords.name"),
            'position'  => __("keywords.position"),
            'image'     => __("keywords.image"),
            'facebook'  => __("keywords.facebook"),
            'linkedin'  => __("keywords.linkedin"),
            'twitter'   => __("keywords.twitter"),
        ];
    }
}
