<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidateUsername;

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
            'email' => 'required|email|not_regex:/^[root]/',
            'password' => 'required|min:8',
            'facebook' => 'url',
            'youtube' => 'url'
            
        ];
    }
    public function messages()
{
    return [
        'name.required' => 'Không được bỏ trống',
        'name.min' => 'Vui lòng nhập nhiều hơn 2 kí tự',
        'name.not_regex' => 'Không được nhập kí tự @, #, $, %, &, *',
        'password.required' => 'Vui lòng nhập mật khẩu',
        'password.min' => 'Nhập tối thiểu 8 kí tự',
        'facebook.url' => 'Phải đúng định dạng url',
        'youtube.url' => 'Phải đúng định dạng url',

        
    ];
}
}
