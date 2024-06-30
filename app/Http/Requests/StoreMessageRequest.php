<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
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
            'name'    => 'required|string',
            'email'   => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'name.required'    => 'The name field is required.',
            'email.required'   => 'The email field is required.',
            'email.email'      => 'The email must be a valid email address.',
            'subject.required' => 'The subject field is required.',
            'message.required' => 'The message field is required.',
        ];
    }

    /**
     * Get custom attribute names.
     */
    public function attributes(): array
    {
        return [
            'name'    => 'name',
            'email'   => 'email',
            'subject' => 'subject',
            'message' => 'message',
        ];
    }
}
