<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::all();

        return view('admin.categories.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }
    public function store(Request $request)
    {
        $category=new Category();
        $category->title=$request->title;
        $category->is_active=$request->is_active;
        $category->save();
        if ($request->post != null)
        {
            $post=new Post();
            $post->title=$request->post;
            $post->categoryId=$category->id;
            $post->content=$request->postContent;
            $post->is_active=1;
            $post->save();
        }
        return redirect('admin/categories/list');
    }
    public function edit($id)
    {
        $category=Category::find($id);
        if ($category)
        {
            return view('admin.categories.edit',compact('category'));
        }
        else
        {
            return redirect()->back();
        }
    }
    public function update(Request $request,$id)
    {
        $category=Category::find($id);
        $category->title=$request->title;
        $category->is_active=$request->is_active;

        $category->save();

        return redirect('admin/categories/list');
    }
    public function isActiveTrue($id)
    {
        $category=Category::find($id);
        $category->is_active=1;
        $category->save();

        return redirect('admin/pages/list');
    }

    public function isActiveFalse($id)
    {
        $category=Category::find($id);
        $category->is_active=0;
        $category->save();

        return redirect('admin/pages/list');
    }
    public function delete($id)
    {

        $category=Category::find($id);
        $category->delete();
        return redirect('admin/pages/list');
    }
}
