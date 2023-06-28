<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $pageSize = 5;
        $searchData = $request->except('page');

        if (count($request->all()) == 0) {
            // Lay ra dan sach san pham & phan trang cho no
            $posts = Post::orderBy('created_at', 'DESC')->paginate($pageSize);
        }else{
            $postQuery = Post::where('name', 'like', "%" . $request->keyword . "%");

            $posts = $postQuery->orderBy('created_at', 'DESC')->paginate($pageSize)->appends($searchData);
        }

        return view('admin.post.index', compact('posts', 'searchData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.post.create', compact('category'));
    }

    public function store(Request $request)
    {
        $model = new Post();
        $model->fill($request->all());
        if($request->hasFile('uploadfile')){
            $model->thumbnail = $request->file('uploadfile')->storeAs('uploads/posts', uniqid() . '-' . $request->uploadfile->getClientOriginalName());
        }
        $model->slug = \Str::slug($request->title);
        $model->user_id = Auth::id();
        $model->save();
        // return redirect(route('post.index'));
        return Redirect::to("admin/bai-viet/")->with('success', "Tạo Bài Viết Mới Thành Công");
    }

    public function show($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return redirect()->back();
        }

        return view('admin.post.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $category = Category::all();
        if (!$post) {
            return redirect()->back()->with('danger', 'Không Tìm Thấy Bài Viết Này')->withInput();
        }

        return view('admin.post.edit', compact('post', 'category'));
    }

    public function update($id, Request $request)
    {
        $model = Post::find($id);

        $model->fill($request->all());

        // upload ảnh
        if($request->hasFile('uploadfile')){
            $model->thumbnail = $request->file('uploadfile')->storeAs('uploads/posts', uniqid() . '-' . $request->uploadfile->getClientOriginalName());
        }
        $model->slug = \Str::slug($request->title);
        $model->user_id = Auth::id();
        $model->save();

        return Redirect::to("admin/bai-viet/")->with('success', "Cập Nhật Bài Viết Thành Công");
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
    
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
    
            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();
    
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
    
            //Upload File
            $request->file('upload')->storeAs('uploads/posts', $filenametostore);
    
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/'.$filenametostore); 
            $msg = 'Image successfully uploaded'; 
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            
            // Render HTML output 
            @header('Content-type: text/html; charset=utf-8'); 
            echo $re;
        }
        // if($request->hasFile('upload')) {
        //     $originname = $request->file('upload')->getClientOriginalName();
        //     $filename = pathinfo($originname, PATHINFO_FILENAME);

        //     $extension = $request->file('upload')->getClientOriginalExtension();

        //     $filename = $filename.'_'.time().'.'.$extension;

        //     $request->file('upload')->move(public_path('posts'), $filename);

        //     $CKEditorFuncNum = $request->input('CKEditorFuncNum');

        //     $url = asset('images/'.$filename);
        //     $msg = 'Image Upload Successfully.';

        //     $response = "<script> window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

        //     @header('Content-type: text/html; charset=utf8');

        //     echo $response;
        // }
    }

    public function remove($id){
        // $post = Post::find($id);
        // if (count($post->products) > 0) {
        //     return redirect()->back()->with('danger', 'Bài Viết đang tồn tại sản phẩm! Không thể xóa')->withInput();
        // }
        // $post->delete();
        // return redirect()->back()->with('success', 'Xóa Bài Viết Thành Công')->withInput();
    }
}
