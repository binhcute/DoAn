<?php

namespace App\Http\Requests\Admin\Account;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'status' => 'required',
            'level' => 'required'
        ];
    }
    public function messages(){
        return [
            'firstName.required' => 'Họ không được bỏ trống',
            'lastName.required' => 'Tên không được bỏ trống',
            'email.required' => 'Email không được bỏ trống',
            'status.required' => 'Trạng Thái không được bỏ trống',
            'level.required' => 'Cấp Bật không được bỏ trống'
        ];
    }
}
