<?php

namespace App\Http\Requests\Permission;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class PermissionRequest extends FormRequest
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
                Rule::unique('permissions')->ignore($this->permission),
            ],
            'key' => [
                'required',
                Rule::unique('permissions')->ignore($this->permission),
            ],
            'permission_group_id' => [
                'required',
                'numeric',
                'min:0',
                'not_in:0',
                Rule::exists('permission_groups', 'id'),
            ],
        ];
    }
    
    
}
