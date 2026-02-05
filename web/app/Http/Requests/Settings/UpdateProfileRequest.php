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
            'banner'   => [
                'sometimes', 'image', 'mimes:jpeg,png,jpg', 'max:5000',
                Rule::dimensions()
                    ->minWidth(1200)
                    ->minHeight(300)
                    ->maxWidth(3000)
                    ->maxHeight(800),
            ],
            'avatar'   => [
                'sometimes', 'image', 'mimes:jpeg,png,jpg', 'max:5000',
                Rule::dimensions()
                    ->minWidth(200)
                    ->minHeight(200)
                    ->maxWidth(1000)
                    ->maxHeight(1000),
            ],
            'name'     => ['sometimes', 'string', 'min:2', 'max:50', 'regex:/^[A-Za-zА-Яа-яЁё ]+$/u'],
            'username' => [
                'sometimes', 'string', 'min:2', 'max:70', 'regex:/^[A-Za-z0-9._-]+$/',
                Rule::unique('users')->ignore(auth()->user()),
            ],
        ];
    }
}
