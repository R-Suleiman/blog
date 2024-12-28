<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = PostCategory::all();
        return view("admin.post-categories.index", ["categories"=> $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.post-categories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = $request->validate([
            'category' => 'required'
        ]);

        PostCategory::create($category);

        return to_route('admin.post-category.index')->with('message', 'Category Created!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostCategory $post_category)
    {
        $post_category->delete();
        return to_route('admin.post-category.index')->with('message', 'Category deleted!');
    }
}
