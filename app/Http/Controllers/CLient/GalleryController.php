<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ParentCategory;
use App\Models\Category;
use App\Models\ProductGallery;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $parentCategory = ParentCategory::all();
        $categories = Category::all();
        $galleries = ProductGallery::all();
        
        return view('client.gallery.index', compact('galleries', 'parentCategory', 'categories'));
    }
}
