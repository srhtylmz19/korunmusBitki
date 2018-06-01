<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Portfolio;
use Psy\Util\Json;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public function index()
    {

        $galleries=Gallery::with('portfolio')->get();

        return view('admin.gallery.index',compact('galleries'));
    }
    public function isActiveTrue($id)
    {
        $gallery=Gallery::find($id);
        $gallery->is_active=1;
        $gallery->save();

        return redirect('admin/gallery/list');
    }

    public function isActiveFalse($id)
    {
        $gallery=Gallery::find($id);
        $gallery->is_active=0;
        $gallery->save();

        return redirect('admin/gallery/list');
    }
    public function delete($id)
    {

        $gallery=Gallery::find($id);
        $gallery->delete();
        return redirect('admin/gallery/list');
    }
    public function create()
    {
        $portfolios=Portfolio::all();
        return view('admin.gallery.create',compact('portfolios'));
    }
    public function store(Request $request)
    {


        try
        {

            $extension = $request->file('image')->getClientOriginalExtension();

            $extension = strtolower($extension);

            if ($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg')
            {

                $imageTempName = $request->file('image')->getPathname();

                $imageName = $request->file('image')->getClientOriginalName();
                $imageNameWithoutEx=explode(".", $imageName)[0];
                $imageName= $imageNameWithoutEx . '.' . $extension;


                $path = base_path() . '/public/images/';

                $imagePath = '/uploads/images/'.$imageName;

                $allGalleries=Gallery::all();
                foreach ($allGalleries as $allGalleries)
                {
                    if ($imageName == $allGalleries->image)
                    {
                        $imageName=$imageNameWithoutEx . '' . +time() . '.' . $extension ;

                    }
                }

                $request->file('image')->move($path, $imageName);

                $gallery=new Gallery();
                $gallery->portfolioId=$request['portfolioId'];
                $gallery->title=$request['title'];
                $gallery->image_id=1;
                $gallery->is_active=$request['is_active'];
                $gallery->image=$imageName;

                $gallery->save();


            }
            else
            {
                return redirect('admin/gallery/list')->with('notDone','Resim Dosyası Seçiniz');

            }
        }
        catch (\Exception $exception)
        {
            return redirect('admin/gallery/list')->with('notDone','Ürün Eklenemedi');

        }


        return redirect('admin/gallery/list')->with('done','Ürün Başarıyla Eklendi');
    }
    public function edit($id)
    {
        $gallery=Gallery::find($id);
        if ($gallery)
        {
            $portfolios=Portfolio::all();
            return view('admin.gallery.edit',compact('gallery','portfolios'));
        }
        else
        {
            return redirect()->back();
        }
    }

    public function update(Request $request,$id)
    {
        $gallery=Gallery::find($id);

        if ($request->file('image') != "")
        {

            try
            {
                $extension = $request->file('image')->getClientOriginalExtension();

                $extension = strtolower($extension);

                if ($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg')
                {

                    $imageTempName = $request->file('image')->getPathname();

                    $imageName = $request->file('image')->getClientOriginalName();
                    $imageNameWithoutEx=explode(".", $imageName)[0];
                    $imageName= $imageNameWithoutEx . '.' . $extension;


                    $path = base_path() . '/public/images/';

                    $imagePath = '/uploads/images/'.$imageName;

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
                    return redirect('admin/gallery/list')->with('notDone','Resim Dosyası Seçiniz');

                }
            }
            catch (\Exception $exception)
            {
                return redirect('admin/gallery/list')->with('notDone','Ürün Güncellenemedi');
            }

        }


        $gallery->portfolioId=$request['portfolioId'];
        $gallery->title=$request['title'];
        $gallery->is_active=$request['showState'];

        $gallery->save();


        return redirect('admin/gallery/list')->with('done','Ürün Başarıyla Güncellendi');
    }
    public function createImage()
    {
        $portfolios=Portfolio::all();
        $galleries=Gallery::all();

        return view('admin.gallery.createImage',compact('portfolios','galleries'));
    }
    public function getGalleries(Request $request)
    {
    $value=$request->input('selectedPortfolio');
    $galleries=Gallery::where('portfolioId','=',$value)->get();

    return $galleries->toJson();
    }
}
