<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ParentCategory;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\CategoryFormRequest;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pageSize = 10;
        $searchData = $request->except('page');

        if (count($request->all()) == 0) {
            // Lay ra dan sach san pham & phan trang cho no
            $categories = Category::paginate($pageSize);
        }else{
            $categoryQuery = Category::where('name', 'like', "%" . $request->keyword . "%");

            $categories = $categoryQuery->paginate($pageSize)->appends($searchData);
        }
        $categories->load('parent_category');
        // dd($categories);
        
        return view('admin.category.index', compact('categories', 'searchData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentCategory = ParentCategory::all();
        return view('admin.category.create', compact('parentCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryFormRequest $request)
    {
        // dd($request);
        $model = new Category();
        $model->fill($request->all());
        if($request->hasFile('uploadfile')){
            $model->image = $request->file('uploadfile')->storeAs('uploads/categories', uniqid() . '-' . $request->uploadfile->getClientOriginalName());
        }
        $model->slug = \Str::slug($request->name);
        $model->save();
        // return redirect(route('category.index'));
        return Redirect::to("admin/danh-muc/")->with('success', "Tạo Danh Mục Mới Thành Công");
        // return redirect()->back()->with('success', 'Tạo Danh Mục Mới Thành Công.')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Category::find($id);

        if (!$model) {
            return redirect()->back()->with("danger", "Lỗi Hệ Thống !")->withInput();
        }

        return view('admin.category.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Category::find($id);
        $parentCategory = ParentCategory::all();

        if (!$model) {
            return redirect()->back()->with('danger', 'Không Tìm Thấy Danh Mục Này')->withInput();
        }

        return view('admin.category.edit', compact('model', 'parentCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, CategoryFormRequest $request)
    {
        $model = Category::find($id);

        $model->fill($request->all());

        // upload ảnh
        if($request->hasFile('uploadfile')){
            $model->image = $request->file('uploadfile')->storeAs('uploads/products', uniqid() . '-' . $request->uploadfile->getClientOriginalName());
        }
        $model->slug = \Str::slug($request->name);
        $model->save();

        return Redirect::to("admin/danh-muc/")->with('success', "Cập Nhật Danh Mục Thành Công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove($id){
        $category = Category::find($id);
        if (count($category->products) > 0) {
            return redirect()->back()->with('danger', 'Danh mục đang tồn tại sản phẩm! Không thể xóa')->withInput();
        }
        $category->delete();
        return redirect()->back()->with('success', 'Xóa Danh Mục Thành Công')->withInput();
    }
}
