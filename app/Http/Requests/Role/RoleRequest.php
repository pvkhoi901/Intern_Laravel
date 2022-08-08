<?php

namespace App\Http\Requests\Role;

use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'name' => ['required', Rule::unique('roles')->ignore($this->role)],
            'permission_ids' => ['array', 'required'],
        ];
    }
}
