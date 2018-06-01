<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Portfolio;
use App\Post;
use App\Image;
use App\portfolioCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PortfolioCategoriesController extends Controller
{
    public function index()
    {
        $portfolioCategories=portfolioCategory::all();

        return view('admin.portfolioCategories.index',compact('portfolioCategories'));
    }
    public function create()
    {
        return view('admin.portfolioCategories.create');
    }
    public function store(Request $request)
    {

        $portfolioCategory=new portfolioCategory();
        $portfolioCategory->title=$request->title;
        $portfolioCategory->is_active=$request->is_active;
        $portfolioCategory->save();

        if($request->portfolioTitle != null)
        {
            $portfolio=new Portfolio();
            $portfolio->title=$request->portfolioTitle;
            $portfolio->portfolioCategoryId=$portfolioCategory->id;
            $portfolio->is_active=1;
            $portfolio->save();
            if ($request->galleryTitle != null)
            {
                $gallery=new Gallery();
                $gallery->title=$request->galleryTitle;
                $gallery->portfolioId=$portfolio->id;
                $gallery->is_active=1;
                $gallery->image_id=1;
                if ($request->file('image') != null)
                {
                    try
                    {
                        $extension = $request->file('image')->getClientOriginalExtension();
                        $extension = strtolower($extension);
                        if ($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg')
                        {
                            $imageName = $request->file('image')->getClientOriginalName();
                            $imageNameWithoutEx=explode(".", $imageName)[0];
                            $imageName= $imageNameWithoutEx . '.' . $extension;
                            $path = base_path() . '/public/images/';

                            $allGalleries=Gallery::all();
                            foreach ($allGalleries as $allGalleries)
                            {
                                if ($imageName == $allGalleries->image)
                                {
                                    $imageName=$imageNameWithoutEx . '' . +time() . '.' . $extension ;

                                }
                            }
                            $request->file('image')->move($path, $imageName);
                            $gallery->image=$imageName;
                        }
                        else
                        {
                            return redirect('admin/portfolioCategories/list')->with('notDone','Kategori -> Portfolio -> Galeri Başarıyla Yükledi');
                        }
                    }
                    catch (\Exception $exception)
                    {
                        return redirect('admin/portfolioCategories/list')->with('done','Kategori -> Portfolio -> Galeri Başarıyla Yükledi');
                    }
                }
                else
                {
                    return redirect('admin/portfolioCategories/list')->with('done','Kategori -> Portfolio -> Galeri Başarıyla Yükledi');
                }
                $gallery->save();
                return redirect('admin/portfolioCategories/list')->with('done','Kategori -> Portfolio -> Galeri -> Fotoğraf Başarıyla Yüklendi');
            }
            else
            {
                return redirect('admin/portfolioCategories/list')->with('done','Kategori -> Portfolio Başarıyla Yüklendi');
            }

        }
        else
            {
                return redirect('admin/portfolioCategories/list')->with('done','Kategori Başarıyla Yüklendi');
            }

    }
    public function edit($id)
    {
        $portfolioCategory=portfolioCategory::find($id);
        if ($portfolioCategory)
        {
            return view('admin.portfolioCategories.edit',compact('portfolioCategory'));
        }
        else
        {
            return redirect()->back();
        }
    }
    public function update(Request $request,$id)
    {
        $portfolioCategory=portfolioCategory::find($id);
        $portfolioCategory->title=$request->title;
        $portfolioCategory->is_active=$request->is_active;

        $portfolioCategory->save();

        return redirect('admin/portfolioCategories/list')->with('done','Portfolio Categori Başarıyla Güncellendi');
    }
    public function isActiveTrue($id)
    {
        $portfolioCategory=portfolioCategory::find($id);
        $portfolioCategory->is_active=1;
        $portfolioCategory->save();

        return redirect('admin/portfolioCategories/list')->with('done','Portfolio Categori Başarıyla Güncellendi');
    }
    public function isActiveFalse($id)
    {
        $portfolioCategory=portfolioCategory::find($id);
        $portfolioCategory->is_active=0;
        $portfolioCategory->save();

        return redirect('admin/portfolioCategories/list')->with('done','Portfolio Categori Başarıyla Güncellendi');;
    }
    public function delete($id)
    {

        $portfolioCategory=portfolioCategory::find($id);
        $portfolios=Portfolio::where('portfolioCategoryId','=',$portfolioCategory->id)->first();
        if($portfolios != null)
        {
            $portfolios=Portfolio::where('portfolioCategoryId','=',$portfolioCategory->id)->get();
            foreach ($portfolios as $portfolio)
            {
                if($galleries=Gallery::where('portfolioId','=',$portfolio->id)->first() != null)
                {
                    $galleries=Gallery::where('portfolioId','=',$portfolio->id)->get();
                    foreach ($galleries as $gallery)
                    {

                        if($images=Image::where('gallery_id','=',$gallery->id)->first() != null)
                        {
                            $images=Image::where('gallery_id','=',$gallery->id)->get();
                            foreach ($images as $image)
                            {
                                $image->delete();
                            }
                        }
                        $gallery->delete();
                    }
                }
                $portfolio->delete();
            }


        }
        $portfolioCategory->delete();

        return redirect('admin/portfolioCategories/list')->with('done','Portfolio Categori Başarıyla Silindi');
    }
    public function showPosts($id)
    {
        $posts=Post::where('categoryId','=',$id)->get();

        return view('admin.posts.index',compact('posts'));
    }
    public function showPortfolios($id)
    {
        $portfoliosCheck=Portfolio::where('portfolioCategoryId','=',$id)->first();
        $portfolios=Portfolio::where('portfolioCategoryId','=',$id)->get();

        if ($portfoliosCheck != null)
        {
            return view('admin.portfolio.index',compact('portfolios'));
        }
        else
        {
            return redirect()->back()->with('notDone','Seçilen Kategoride Post Bulunmamaktadır');
        }
    }
}
