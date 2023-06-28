<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function loginForm()
    {
        if (Auth::check()) {
            return redirect()->back()->with('danger', "Vui lòng đăng xuất tài khoản trước khi vào trang này!");
        } else {
            return view('auth.login');
        }
    }

    public function postLogin(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        // thực hiện validate bằng $request
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ],
            [
                'email.required' => "Hãy nhập vào tài khoản!",
                'email.email' => "Email không đúng định dạng!",
                'password.required' => "Hãy nhập vào mật khẩu!"
            ]
        );

        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => 2])) {
            Auth::logout();
            return redirect()->back()->with('msg', "Tài khoản của bạn đang bị khóa, liên hệ quản trị viên để mở lại!");
        } elseif(Auth::attempt(['email' => $email, 'password' => $password, 'status' => 1])){
            return redirect(route('dashboard.index'));
        } else {
            return back()->withInput()->with('msg', "Tên đăng nhập hoặc mật khẩu không chính xác. Vui lòng thử lại");
        }
    }
}
