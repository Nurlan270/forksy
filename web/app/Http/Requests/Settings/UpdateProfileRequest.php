<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'     => ['sometimes', 'string', 'min:2', 'max:50', 'regex:/^[A-Za-zА-Яа-яЁё ]+$/u'],
            'username' => [
                'sometimes', 'string', 'min:2', 'max:70', 'regex:/^[A-Za-z0-9._-]+$/',
                Rule::unique('users')->ignore(auth()->user())
            ],
        ];
    }
}
