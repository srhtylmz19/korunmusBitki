<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts=Post::with('category')->get();


        return view('admin.posts.index',compact('posts'));
    }
    public function create()
    {
        $categories=Category::all();
        return view('admin.posts.create',compact('categories'));
    }
    public function store(Request $request)
    {
        $post=new Post();
        $post->title=$request->title;
        $post->content=$request->postContent;
        $post->categoryId=$request->categoryId;
        $post->is_active=$request->is_active;

        $post->save();

        return redirect('admin/posts/list');
    }
    public function isActiveTrue($id)
    {
        $post=Post::find($id);
        $post->is_active=1;
        $post->save();

        return redirect('admin/posts/list');
    }

    public function isActiveFalse($id)
    {
        $post=Post::find($id);
        $post->is_active=0;
        $post->save();

        return redirect('admin/posts/list');
    }
    public function delete($id)
    {

        $post=Post::find($id);
        $post->delete();
        return redirect('admin/posts/list');
    }
    public function edit($id)
    {
        $post=Post::find($id);
        if ($post)
        {
            $categories=Category::all();
            return view('admin.posts.edit',compact('post','categories'));
        }
        else
        {
            return redirect()->back();
        }
    }

    public function update(Request $request,$id)
    {
        $post=Post::find($id);
        $post->title=$request->title;
        $post->categoryId=$request->categoryId;
        $post->content=$request->postContent;
        $post->is_active=$request->is_active;

        $post->save();

        return redirect('admin/posts/list');
    }
}
