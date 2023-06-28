<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Information;
use App\Models\Product;
use App\Models\Post;
use App\Models\ParentCategory;
use App\Models\Category;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $slides = Slider::all();
        $information = Information::find(1);
        $blog = Post::orderBy('created_at', 'DESC')->first();

        $product_suggestions = Product::orderBy('created_at', 'DESC')->paginate(3);

        $parentCategory = ParentCategory::all();
        $categories = Category::all();
        return view('client.home.index', compact('slides', 'information', 'blog', 'product_suggestions', 'parentCategory', 'categories'));
    }

    public function contact(Request $request)
    {
        $information = Information::find(1);
        $parentCategory = ParentCategory::all();
        $categories = Category::all();
        return view('client.contact.index', compact('information', 'parentCategory', 'categories'));
    }
}
