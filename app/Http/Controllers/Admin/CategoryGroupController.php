<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ParentCategory;
use App\Models\Category;

class CategoryGroupController extends Controller
{
    public function index(Request $request)
    {
        $pageSize = 10;
        $parentCategory = ParentCategory::paginate($pageSize);

        return view('admin.categoryGroup.index', compact('parentCategory'));
    }
}
