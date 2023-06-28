<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageSize = 5;
        $sliders = Slider::paginate($pageSize);
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'uploadfile' => 'required',
            'uploadfile' => 'mimes:jpg,bmp,png,jpeg|max:2048',
            ], [
                'title.required' => "Nhập vào mô tả slider",
                'uploadfile.required' => "Hãy chọn ảnh slider",
                'uploadfile.mimes' => 'File ảnh không đúng định dạng (jpg, bmp, png, jpeg)',
                'uploadfile.max' => 'File ảnh không được quá 2MB',
        ]);

        $model = new Slider();
        $model->fill($request->all());
        if($request->hasFile('uploadfile')){
            $model->image = $request->file('uploadfile')->storeAs('uploads/sliders', uniqid() . '-' . $request->uploadfile->getClientOriginalName());
        }
        $model->alt = \Str::slug($request->title);
        $model->save();
        return Redirect::to("admin/slider/")->with('success', "Tạo Slider Mới Thành Công");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);

        $request->validate([
            'title' => 'required',
            'uploadfile' => 'mimes:jpg,bmp,png,jpeg|max:2048',
            ], [
                'title.required' => "Nhập vào mô tả slider",
                'uploadfile.mimes' => 'File ảnh không đúng định dạng (jpg, bmp, png, jpeg)',
                'uploadfile.max' => 'File ảnh không được quá 2MB',
        ]);

        if (!$slider) {
            return redirect()->back()->with("danger", "Lỗi Hệ Thống !")->withInput();
        }
        
        $slider->fill($request->all());

        if($request->hasFile('uploadfile')){
            $slider->image = $request->file('uploadfile')->storeAs('uploads/sliders', uniqid() . '-' . $request->uploadfile->getClientOriginalName());
        }
        $slider->alt = \Str::slug($request->title);
        $slider->save();

        return Redirect::to("admin/slider/")->with('success', "Sửa Slider Thành Công");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        if (!$slider) {
            return redirect()->back()->with("danger", "Lỗi Hệ Thống !")->withInput();
        }
        $slider->delete();
        return redirect()->back()->with('success', 'Xóa Slider Thành Công')->withInput();
    }
}
