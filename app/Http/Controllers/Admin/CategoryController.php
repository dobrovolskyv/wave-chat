<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories= CategoryResource::collection(Category::all())->resolve();
        return inertia('Admin/Category/Index', compact('categories'));
    }
}
