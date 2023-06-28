<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pageSize = 5;
        $searchData = $request->except('page');

        if (count($request->all()) == 0) {
            // Lay ra dan sach san pham & phan trang cho no
            $model = Material::paginate($pageSize);
        }else{
            $materialQuery = Material::where('name', 'like', "%" . $request->keyword . "%");

            $model = $materialQuery->paginate($pageSize)->appends($searchData);
        }

        return view('admin.material.index', compact('model', 'searchData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.material.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|unique:materials"
        ], [
            "name.required" => "Hãy nhập tên vật liệu!",
            "name.unique" => "Tên vật liệu đã tồn tại !",
        ]);

        $model = new Material();
        $model->fill($request->all());
        $model->slug = \Str::slug($request->name);
        $model->save();

        return Redirect::to("admin/vat-lieu/")->with('success', "Tạo Vật Liệu Mới Thành Công");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Material::find($id);

        if (!$model) {
            return redirect()->back();
        }

        return view('admin.material.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Material::find($id);

        if (!$model) {
            return redirect()->back()->with('danger', 'Không Tìm Thấy Vật Liệu Này')->withInput();
        }

        return view('admin.material.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  =>  [ 
                'required', Rule::unique('materials')->ignore($id)
            ],
        ], [
            "name.required" => "Hãy nhập tên vật liệu !",
            "name.unique" => "Tên vật liệu đã tồn tại !",
        ]);

        $model = Material::find($id);

        $model->fill($request->all());
        $model->slug = \Str::slug($request->name);
        $model->save();
        return Redirect::to("admin/vat-lieu/")->with('success', "Cập Nhật Vật Liệu Thành Công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $material = Material::find($id);
        if (count($material->products) > 0) {
            return redirect()->back()->with('danger', 'Vật Liệu đang tồn tại sản phẩm! Không thể xóa')->withInput();
        }
        $material->delete();
        return redirect()->back()->with('success', 'Xóa Vật Liệu Thành Công')->withInput();
    }
}
