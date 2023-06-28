<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $pageSize = 5;
        $searchData = $request->except('page');

        if (count($request->all()) == 0) {
            $users = User::paginate($pageSize);
        }else{
            $userQuery = User::where('name', 'like', "%" . $request->keyword . "%");
            
            $users = $userQuery->paginate($pageSize)->appends($searchData);
        }

        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(UserRequest $request)
    {
        // dd($request);
        $user = new User();
        $user->fill($request->all());
        if($request->hasFile('uploadfile')){
            $user->avatar = $request->file('uploadfile')->storeAs('uploads/avatars', uniqid() . '-' . $request->uploadfile->getClientOriginalName());
        }
        /**
         * HungTM
         * Tao token
         * Start
         */
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet .= "0123456789";
        $max = strlen($codeAlphabet);

        for ($i = 0; $i <= 10; $i++) {
            $token .= $codeAlphabet[rand(0, $max - 1)];
        }
        /**
         * HungTM
         * Tao token
         * End
         */
        $user->password = Hash::make($request->password);
            $user->remember_token = $token;
        $user->save();
        return Redirect::to("admin/tai-khoan/")->with('success', "Tạo Tài Khoản Mới Thành Công");
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('admin.user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        if (empty($user)) {
            return redirect()->back()->with('danger', 'Không Thể Thực Hiện Thao Tác')->withInput();
        }elseif ($id != strval(Auth::user()->id)) {
            return redirect()->back()->with('danger', 'Không Thể Thực Hiện Thao Tác 2')->withInput();
        }else{
            return view('admin.user.edit', compact('user'));
        }
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back();
        }

        $request->validate([
            'name'  =>  [ 
                'required', Rule::unique('users')->ignore($id)
            ],
            'email' => [
                'required',
                Rule::unique('users')->ignore($id)
            ],
            ], [
            "name.required" => "Hãy Nhập Vào Tên Tài Khoản !",
            "name.unique" => "Tên cơ sở đã tồn tại !",
            "email.required" => "Hãy Nhập Vào Email !",
            "email.unique" => "Email Đã Được Sử Dụng !",
        ]);

        $user->fill($request->all());
        // upload ảnh
        if ($request->hasFile('avatar')) {
            Storage::delete($user->avatar);
            $user->avatar = $request->file('avatar')->storeAs('uploads/users', uniqid() . '-' . $request->avatar->getClientOriginalName());
        }
        $user->save();
        return Redirect::to("admin/tai-khoan/")->with('success', "Cập Nhật Thông Tin Tài Khoản Thành Công");
        // return redirect()->back()->with('success', 'Cập Nhật Thông Tin Tài Khoản Thành Công')->withInput();
    }

    public function changePassword($id, Request $request)
    {
        $user = User::find($id);
        if (empty($user)) {
            return redirect()->back()->with('danger', 'Không Thể Thực Hiện Thao Tác')->withInput();
        }elseif ($id != strval(Auth::user()->id)) {
            return redirect()->back()->with('danger', 'Không Thể Thực Hiện Thao Tác 2')->withInput();
        }else{
            return view('admin.user.changePassword', compact('user'));
        }
    }

    public function postChangePassword($id, Request $request)
    {
        if ($id === strval(Auth::user()->id)) {
            if (!(Hash::check($request->get('currentpassword'), Auth::user()->password))) {
                return redirect()->back()->with("danger", "Mật khẩu hiện tại không chính xác. Vui Lòng Thử Lại!")->withInput();
            }
            $request->validate(
                [
                    'currentpassword' => 'required',
                    'newpassword' => 'required',
                    'cfpassword' => 'required|same:newpassword|'
                ],
                [
                    'currentpassword.required' => "Hãy Nhập Mật Khẩu Cũ",
                    'newpassword.required' => "Hãy Nhập Mật Khẩu Mới",
                    'cfpassword.required' => "Hãy Nhập Xác Nhận Mật Khẩu",
                    'cfpassword.same' => "Mật Khẩu Xác Nhận Không Giống Với Mật Khẩu Mới"
                ]
            );
            if (strcmp($request->get('currentpassword'), $request->get('newpassword')) == 0) {
                return redirect()->back()->with("danger", "Mật khẩu mới không được giống với hiện tại !")->withInput();
            }
    
            $user = User::find($id);
            $user->password = Hash::make($request->newpassword);
            $user->save();
            Auth::logout();
            return redirect::to("login")->with('msg', "Đổi mật khẩu thành công. Vui Lòng Đăng Nhập Lại!");
        }else{
            $user = User::find($id);
            if (!(Hash::check($request->get('currentpassword'), $user->password))) {
                return redirect()->back()->with("danger", "Mật khẩu hiện tại không chính xác. Vui Lòng Thử Lại!")->withInput();
            }
            $request->validate(
                [
                    'currentpassword' => 'required',
                    'newpassword' => 'required',
                    'cfpassword' => 'required|same:newpassword|'
                ],
                [
                    'currentpassword.required' => "Hãy Nhập Mật Khẩu Cũ",
                    'newpassword.required' => "Hãy Nhập Mật Khẩu Mới",
                    'cfpassword.required' => "Hãy Nhập Xác Nhận Mật Khẩu",
                    'cfpassword.same' => "Mật Khẩu Xác Nhận Không Giống Với Mật Khẩu Mới"
                ]
            );
            if (strcmp($request->get('currentpassword'), $request->get('newpassword')) == 0) {
                return redirect()->back()->with("danger", "Mật khẩu mới không được giống với hiện tại !")->withInput();
            }

            $user->password = Hash::make($request->newpassword);
            $user->save();
            return Redirect::to("admin/tai-khoan/")->with('success', "Đổi Mật Khẩu Tài Khoản {$user->email} Thành Công");
        }
    }

    public function resetPassword($id, Request $request)
    {
        $user = User::find($id);
        if (empty($user)) {
            return redirect()->back()->with('danger', 'Không Thể Thực Hiện Thao Tác')->withInput();
        }

        $password = '123123';

        $user->password = Hash::make($password);
        $user->save();
        return Redirect::to("admin/tai-khoan/")->with('success', "Mật Khẩu Cài Lại Là: 123123");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (empty($user)) {
            return redirect()->back()->with('danger', 'Không Thể Thực Hiện Thao Tác')->withInput();
        }
    }
}
