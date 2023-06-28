<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ParentCategory;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallery;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $pagesize = 9;
        $searchData = $request->except('page');
        // $products = Product::orderBy('created_at', 'DESC')->paginate($pagesize);

        if (count($request->all()) == 0) {
            $products = Product::orderBy('created_at', 'DESC')->paginate($pagesize);
        } else {
            $productQuery = Product::where('name', 'like', "%" . $request->keyword . "%")->orderBy('created_at', 'DESC');

            if ($request->has('category_id') && $request->category_id != "") {
                $productQuery = $productQuery->where('category_id', $request->category_id)->orderBy('created_at', 'DESC');
            }

            $products = $productQuery->paginate($pagesize)->appends($searchData);
        }
        // dd($products);
        $parentCategory = ParentCategory::all();
        $categories = Category::all();
        
        return view('client.product.index', compact('products', 'categories', 'parentCategory', 'searchData'));
    }

    public function detail($slug, Request $request)
    {
        $product = Product::where('slug', $slug)->first();
        if(!$product){
            // return redirect()->back();
            abort(404);
        }
        $product->load('galleries');
        // dd($product);
        $product_suggestions = Product::orderBy('created_at', 'DESC')->paginate(4);

        $parentCategory = ParentCategory::all();
        $categories = Category::all();

        return view('client.product.detail', compact('product', 'product_suggestions', 'categories', 'parentCategory'));
    }
}
