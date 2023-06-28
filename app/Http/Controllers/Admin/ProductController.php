<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Category;
use App\Models\ParentCategory;
use App\Models\Material;
use App\Models\ProductGallery;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

// use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $pageSize = 5;
        $searchData = $request->except('page');

        if (count($request->all()) == 0) {
            // Lay ra dan sach san pham & phan trang cho no
            $products = Product::orderBy('created_at', 'DESC')->paginate($pageSize);
        }else{
            $productQuery = Product::where('name', 'like', "%" . $request->keyword . "%");
            
            if ($request->has('category_id') && $request->category_id != "") {
                $productQuery = $productQuery->where('category_id', $request->category_id);
            }

            if ($request->has('material_id') && $request->material_id != "") {
                $productQuery = $productQuery->where('material_id', $request->material_id);
            }
            $products = $productQuery->orderBy('created_at', 'DESC')->paginate($pageSize)->appends($searchData);
        }
        $products->load('category', 'galleries', 'material');
        
        $parentCategory = ParentCategory::all();
        $categories = Category::all();
        $materials = Material::all();
        return view('admin.product.index', compact('products', 'categories', 'materials', 'searchData', 'parentCategory'));
    }

    public function addForm()
    {
        $categories = Category::all();
        $parentCategory = ParentCategory::all();
        $material = Material::all();
        return view('admin.product.add-form', compact('categories', 'material', 'parentCategory'));
    }

    public function saveAdd(ProductRequest $request)
    {
        $model = new Product();
        
        $last_id = Product::latest()->first()->id + 1;
        $model->name = $request->name . ' QA ' . $last_id;
        $model->fill($request->all());
        if($request->hasFile('uploadfile')){
            $model->image = $request->file('uploadfile')->storeAs('uploads/products', uniqid() . '-' . $request->uploadfile->getClientOriginalName());
        }
        $model->slug = \Str::slug($request->name) . '-sp-' . $plus;
        $model->save();
        if($request->has('galleries')){
            foreach($request->galleries as $i => $item){
                $galleryObj = new ProductGallery();
                $galleryObj->product_id = $model->id;
                $galleryObj->order_no = $i+1;
                $galleryObj->image_url = $item->storeAs('uploads/products/galleries/' . $model->id , 
                                        uniqid() . '-' . $request->uploadfile->getClientOriginalName());
                $galleryObj->save();
            }
        }

        return Redirect::to("admin/san-pham/")->with('success', "Tạo Sản Phẩm Mới Thành Công");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    
    public function editForm($id)
    {
        $model = Product::find($id);
        if(!$model){
            return redirect()->back();
        }

        $category = Category::all();
        $material = Material::all();

        $model->load('galleries');
        return view('admin.product.edit-form', compact('model', 'category', 'material'));
    }

    
    public function saveEdit($id, ProductRequest $request)
    {
        $model = Product::find($id); //Tim sp qua ID
        
        if(!$model){
            return redirect()->back();
        }
        $model->fill($request->all());

        // upload ảnh
        if($request->hasFile('uploadfile')){
            $model->image = $request->file('uploadfile')->storeAs('uploads/products', uniqid() . '-' . $request->uploadfile->getClientOriginalName());
        }
        $model->slug = \Str::slug($request->name);
        $model->save();

        // xóa gallery đc mark là bị xóa đi
        if($request->has('removeGalleryIds')){
            $strIds = rtrim($request->removeGalleryIds, '|');
            $lstIds = explode('|', $strIds);
            // xóa các ảnh vật lý
            $removeList = ProductGallery::whereIn('id', $lstIds)->get();
            foreach ($removeList as $gl) {
                Storage::delete($gl->image_url);
            }
            
            ProductGallery::destroy($lstIds);
        }

        // lưu mới danh sách gallery
        if($request->has('galleries')){
            foreach($request->galleries as $i => $item){
                $galleryObj = new ProductGallery();
                $galleryObj->product_id = $model->id;
                $galleryObj->order_no = $i+1;
                $galleryObj->image_url = $item->storeAs('uploads/products/galleries/' . $model->id , 
                                        uniqid() . '-' . $item->getClientOriginalName());
                $galleryObj->save();
            }
        }
        return Redirect::to("admin/san-pham/")->with('success', "Cập Nhật Sản Phẩm Thành Công");
    }

    public function remove($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('success', 'Xóa Sản Phẩm Thành Công')->withInput();
    }
}
