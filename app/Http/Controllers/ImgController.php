<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImgController extends Controller
{
    public function store(Request $request)
    {
        $img = $request->file('file');

        $imgName = Str::uuid() . "." . $img->extension();
        $imageServe = Image::make($img);
        //Procesando Imagen
        $imageServe->fit(1000, 1000);
        $imgPath = public_path('uploads') . '/' . $imgName;
        $imageServe->save($imgPath);

        return response()->json(['imagen' => $imgName]);
    }
}