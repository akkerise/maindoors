<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRegisterRequest extends FormRequest
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
            'fullname' => 'required|between:6,64',
            'username' => 'required|between:6,64',
            'email' => 'required|email|between:6,64',
            'password' => 'required|between:6,32',
            'repassword' => 'required|same:password|between:6,32',
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'Bạn bắt buộc phải nhập tên vào ô trống',
            'fullname.between' => 'Bạn chỉ nên nhập tên có độ dài :min đến :max ký tự',
            'username.required' => 'Bạn bắt buộc phải nhập tên vào ô trống',
            'username.between' => 'Bạn chỉ nên nhập tên tài khoản có độ dài :min đến :max ký tự',
            'email.required' => 'Bạn bắt buộc phải nhập email vào ô trống',
            'email.email' => 'Email của bạn phải đúng định dạng ',
            'email.between' => 'Bạn chỉ nên nhập email có độ dài :min đến :max ký tự',
            'password.required' => 'Bạn bắt buộc phải nhập mật khẩu vào ô trống',
            'password.between' => 'Bạn chỉ nên nhập mật khẩu có độ dài :min đến :max ký tự',
            'repassword.required' => 'Bạn bắt buộc phải nhập mật khẩu vào ô trống',
            'repassword.same' => 'Bạn bắt buộc phải nhập hai mật khẩu giống nhau',
        ];
    }
}
