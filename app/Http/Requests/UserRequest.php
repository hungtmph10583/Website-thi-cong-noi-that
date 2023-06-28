<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $ruleArr = [
            'name' => [
                'required',
                Rule::unique('users')->ignore($this->id)
            ],
            'email' => [
                'required',
                Rule::unique('users')->ignore($this->id)
            ],
            'password' => 'required|min:6',
            'cfpassword' => 'required|same:password',
            // 'phone' => [
            //     'regex:/^(09|03|07|08|05)[0-9]{8,9}$/',
            //     Rule::unique('users')->ignore($this->id)
            // ],
        ];
        if($this->id == null){
            $ruleArr['uploadfile'] = 'mimes:jpg,bmp,png,jpeg';
        }
        return $ruleArr;
    }

    public function messages(){
        return [
            'name.required' => 'Hãy Nhập Vào Tên Tài Khoản !',
            'name.unique' => 'Tên Tài Khoản Đã Được Sử Dụng !',
            'email.required' => 'Hãy Nhập Vào Email !',
            'email.unique' => 'Email Đã Được Sử Dụng !',
            'uploadfile.mimes' => 'File ảnh sản phẩm không đúng định dạng (jpg, bmp, png, jpeg)',
            'password.required' => 'Hãy Nhập Vào Mật Khẩu !',
            'password.min' => 'Mật Khẩu Phải Hơn 6 Ký Tự !',
            'cfpassword.required' => 'Nhập Lại Mật Khẩu Một Lần Nữa !',
            'cfpassword.same' => 'Mật Nhập Lại Không Khớp Với Bên Trên !',
            // 'phone.regex' => 'Số Điện Thoại Không Đúng Đinh Đạng',
            // 'phone.unique' => 'Số Điện Thoại Đã Được Sử Dụng',
        ];
    }
}
