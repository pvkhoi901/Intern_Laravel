<?php

namespace App\Http\Requests\Role;

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
            'name' => 'required|min:2|not_regex:/^[@#$%&*]/',
            'role' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Không được bỏ trống',
            'name.min' => 'Vui lòng nhập nhiều hơn 2 kí tự',
            'name.not_regex' => 'Không được nhập kí tự @, #, $, %, &, *',
            'role.required' => 'Không được bỏ trống',
        ];
    }
}
