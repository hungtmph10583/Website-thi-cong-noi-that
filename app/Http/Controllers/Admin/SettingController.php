<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Information;
use Illuminate\Support\Facades\Redirect;

class SettingController extends Controller
{
    public function index(){
        $model = Information::find(1);
        return view('admin.setting.index', compact('model'));
    }

    public function edit($id){
        $model = Information::find($id);

        if (!$model) {
            return redirect()->back()->with('danger', 'Lỗi Hệ Thống')->withInput();
        }

        return view('admin.setting.edit', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'uploadfile' => 'mimes:jpg,bmp,png,jpeg|max:2048',
            ], [
                'uploadfile.mimes' => 'File ảnh không đúng định dạng (jpg, bmp, png, jpeg)',
                'uploadfile.max' => 'File ảnh không được quá 2MB',
        ]);

        $model = Information::find($id);
        // dd($model);
        $model->fill($request->all());

        // upload ảnh
        if($request->hasFile('uploadfile')){
            $model->logo = $request->file('uploadfile')->storeAs('uploads/logo', uniqid() . '-' . $request->uploadfile->getClientOriginalName());
        }

        $model->save();

        return Redirect::to("admin/cai-dat/")->with('success', "Cập Nhật Thông Tin Web Thành Công");
    }
}
