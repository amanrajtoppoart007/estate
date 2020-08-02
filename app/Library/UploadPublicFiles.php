<?php
namespace App\Library;
class UploadPublicFiles
{


    public static function handle($request,$unique_key,$name,$path)
    {
        $upload = null;
        try {

            if ($request->hasfile("$name"))
            {
                $file = $request->file("$name");
                    if($file->isValid())
                    {
                        $path = "/uploads/images/$path/" .'FOLDER'.$unique_key . "/";
                        $full_path = public_path($path);
                        if(!file_exists($full_path))
                        {
                            \mkdir($full_path, 0755,true);
                        }
                        ini_set('memory_limit', '256M');
                        $ext = $file->extension();
                        $upload = $image = 'FILE' . time() . rand(1000, 9999) . '.' . $ext;
                        $file->move($full_path, $image);
                        $upload = $path.$image;
                    }
            }
        }
        catch (\Exception $exception)
        {
          return $upload;
        }
        return $upload;
    }
}
