<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function index()
    {
        $pages=Page::all();

        return view('admin.pages.index',compact('pages'));
    }
    public function create()
    {
        return view('admin.pages.create');
    }
    public function store(Request $request)
    {
        $page=new Page();
        $page->title=$request->title;
        $page->content=$request->pageContent;
        $page->is_active=$request->is_active;

        $page->save();

        return redirect('admin/pages/list');
    }

    public function edit($id)
    {
        $page=Page::find($id);
        if ($page)
        {
            return view('admin.pages.edit',compact('page'));
        }
        else
        {
            return redirect()->back();
        }
    }
    public function isActiveTrue($id)
    {
        $page=Page::find($id);
        $page->is_active=1;
        $page->save();

        return redirect('admin/pages/list');
    }

    public function isActiveFalse($id)
    {
        $page=Page::find($id);
        $page->is_active=0;
        $page->save();

        return redirect('admin/pages/list');
    }



    public function delete($id)
    {

        $page=Page::find($id);
        $page->delete();
        return redirect('admin/pages/list');
    }

    public function update(Request $request,$id)
    {
        $page=Page::find($id);
        $page->title=$request->title;
        $page->content=$request->pageContent;
        $page->is_active=$request->is_active;

        $page->save();

        return redirect('admin/pages/list');
    }
}
