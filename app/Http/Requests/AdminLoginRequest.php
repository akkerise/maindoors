<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest
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
            'username' => 'required|between:6,32',
            'password' => 'required|between:6,32'
        ];
    }

    public function messages()
    {
        return [
          'username.required' => 'Bạn nên nhập vào tài khoản !',
            'username.between' => 'Tài khoản của bạn không nằm trong khoảng ký tự :min -> :max ký tự !',
            'password.required' => 'Bạn nên nhập vào mật khẩu !',
            'password.between' => 'Mật khẩu của bạn không nằm trong khoảng ký tự :min -> :max ký tự !'
        ];
    }
}
