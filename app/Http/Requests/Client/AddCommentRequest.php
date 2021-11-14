<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class AddCommentRequest extends FormRequest
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
            'rate' => 'required',
            'comment_description' => 'required'
        ];
    }
    public function messages(){
        return [
            'rate.required' => 'Vui lòng chọn đánh giá sao',
            'comment_description.required' => 'Vui lòng nhập nội dung bình luận'
        ];
    }
}
