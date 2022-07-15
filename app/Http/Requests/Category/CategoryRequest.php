<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'title' => 'required|min:2|not_regex:/^[@#$%&*]/',
            'description' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Không được bỏ trống',
            'title.min' => 'Vui lòng nhập nhiều hơn 2 kí tự',
            'title.not_regex' => 'Không được nhập kí tự @, #, $, %, &, *',
            'description.required' => 'Không được bỏ trống',
        ];
    }
}
