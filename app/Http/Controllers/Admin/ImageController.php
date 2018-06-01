<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $image=new Image();

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

                    $allImages=Image::all();
                    foreach ($allImages as $allImages)
                    {
                        if ($allImages == $allImages->image)
                        {
                            $imageName=$imageNameWithoutEx . '' . +time() . '.' . $extension ;
                        }
                    }
                    $request->file('image')->move($path, $imageName);
                    $image->image=$imageName;

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

        $image->title=$request['title'];
        $image->gallery_id=$request['galleriesOfPortfolio'];

        $image->save();
        return redirect('admin/gallery/list')->with('done','Resim Başarıyla Eklendi');

    }
    public function sliderIndex()
    {
        $images=Image::all();
        return view('admin.slider.index',compact('images'));
    }

    public function setSlider(Request $request)
    {
        $lng=$request->input('images');
        $lng=sizeof($lng);
        $arr=[];

        for ($i=0; $i<$lng ; $i++)
        {
            $id=$request->input('images')[$i];
            $images=Image::find($id);
            $images->slider_activity= 1;
            $images->save();
            array_push($arr,$images);

        }
        return $arr;


    }
    public function showSlider()
    {
        $sliderImages=Image::where('slider_activity','=',1)->get();

        return view('admin.slider.show',compact('sliderImages'));
    }
    public function deleteImageFromSlider($id)
    {
        $image=Image::find($id);
        $image->slider_activity=0;
        $image->save();

        return redirect()->back();
    }
}
