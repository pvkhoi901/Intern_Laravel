<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidateUsername;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'name' => [
                'required',
                'min:2',
                'not_regex:/^[@#$%&*]/',
                new ValidateUserName(),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($this->user),
            ],
            'username' => [
                'required',
                Rule::unique('users')->ignore($this->user),
            ],
            'password' => [
                'required_with:password_confirmation',
                'min:8',
                'max:200',
                'regex:/^[0-9@#$%&*]+$/',
                'confirmed',
            ],
            'role_ids' => [
                'required',
            ],
        ];
    }
}
