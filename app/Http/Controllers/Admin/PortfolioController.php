<?php

namespace App\Http\Controllers\Admin;

use App\Portfolio;
use App\portfolioCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PortfolioController extends Controller
{
    public function index()
    {

        $portfolios=Portfolio::with('portfolioCategory')->get();
        return view('admin.portfolio.index',compact('portfolios'));
    }
    public function create()
    {

        $portfolioCategories=portfolioCategory::all();
        return view('admin.portfolio.create',compact('portfolioCategories'));
    }

    public function isActiveTrue($id)
    {
        $portfolio=Portfolio::find($id);
        $portfolio->is_active=1;
        $portfolio->save();

        return redirect('admin/portfolio/list');
    }

    public function isActiveFalse($id)
    {
        $portfolio=Portfolio::find($id);
        $portfolio->is_active=0;
        $portfolio->save();

        return redirect('admin/portfolio/list');
    }
    public function delete($id)
    {

        $portfolio=Portfolio::find($id);
        $portfolio->delete();
        return redirect('admin/portfolio/list');
    }
    public function store(Request $request)
    {

        $portfolio=new Portfolio();
        $portfolio->title=$request->title;
        $portfolio->content=$request->portfolioContent;
        $portfolio->portfolioCategoryId=$request->categoryId;
        $portfolio->is_active=$request->is_active;
        $portfolio->save();

        return redirect('admin/portfolio/list');

    }
    public function edit($id)
    {
        $portfolio=Portfolio::find($id);
        if ($portfolio)
        {
            $portfolioCategories=portfolioCategory::all();
            return view('admin.portfolio.edit',compact('portfolio','portfolioCategories'));
        }
        else
        {
            return redirect()->back();
        }
    }
    public function update(Request $request,$id)
    {
        $portfolio=Portfolio::find($id);
        $portfolio->title=$request->title;
        $portfolio->portfolioCategoryId=$request->categoryId;
        $portfolio->content=$request->portfolioContent;
        $portfolio->is_active=$request->is_active;

        $portfolio->save();

        return redirect('admin/portfolio/list');
    }
}
