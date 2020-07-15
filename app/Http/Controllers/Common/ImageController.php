<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as IntImage;
class ImageController extends Controller
{
    public function view_doc($filename='')
    {
        $filename = \base64_decode($filename);
        $filename = "app/".$filename;
        $path     = storage_path($filename);
        if(!file_exists($path))
        {
            $path  = public_path('assets\img\no_doc.png');
        }
        $type     = File::mimeType($path);
        if($type=="image/jpeg"||$type=="image/png"||$type=="image/gif")
        {
            return IntImage::make($path)->response();
        }
        else
        {

            $ext = pathinfo($path,PATHINFO_EXTENSION);
            $file = File::get($path);
            $type = File::mimeType($path);
            $filename = $path.'.'.$ext;
            return response()->file($path,['Content-Type'=>$type]);

        }
    }
}
