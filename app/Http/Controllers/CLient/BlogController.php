<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\ParentCategory;
use App\Models\Category;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $pagesize = 6;
        // $blog = Post::orderBy('created_at', 'DESC');
        $blog_suggestions = Post::orderBy('created_at', 'DESC')->first();
        $blogs = Post::orderBy('created_at', 'DESC')->paginate($pagesize);
        // $blogs = Post::all();
        // dd($blog);
        $parentCategory = ParentCategory::all();
        $categories = Category::all();
        return view('client.blog.index', compact('blogs', 'parentCategory', 'categories', 'blog_suggestions'));
    }

    public function detail($slug, Request $request)
    {
        $blog = Post::where('slug', $slug)->first();
        $post_suggestions = Post::orderBy('created_at', 'DESC')->paginate(4);
        $parentCategory = ParentCategory::all();
        $categories = Category::all();
        return view('client.blog.detail', compact('blog', 'post_suggestions', 'parentCategory', 'categories'));
    }
}
