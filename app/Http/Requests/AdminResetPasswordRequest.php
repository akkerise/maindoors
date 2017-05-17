<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminResetPasswordRequest extends FormRequest
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
            'password' => 'required|between:6,64',
            'confirmpassword' => 'required|same:password|between:6,64'
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Nhập vào mật khẩu của bạn !',
            'confirmpassword.required' => 'Nhập vào xác nhận mật khẩu của bạn !',
            'password.between' => 'Mật khẩu của bạn nên có độ dài từ :min đến :max ký tự !',
            'confirmpassword.between' => 'Mật khẩu xác nhận của bạn nên có độ dài từ :min đến :max ký tự !',
            'comfirmpassword.same' => 'Mật khẩu của bạn không giống nhau !'
        ];
    }
}
