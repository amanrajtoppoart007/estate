<?php
namespace App\Library;
use Illuminate\Http\Request;
use Auth;
use App\Image;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as IntImage;
class CreatePropertyImage
{
    var $admin_id;
    var $property_id;
    var $propcode;
    public function __construct($property_id,$propcode)
    {
        $this->property_id   = $property_id;
        $this->propcode      = $propcode;
        $this->admin_id      = Auth::guard('admin')->user()->id;
    }
   public function execute(Request $request)
   {
       // check if file exist
            if($request->hasfile("images"))
            {
                // get the file
                $files = $request->file("images");
                foreach ($files as $file)
                {
                    if($file->isValid())
                    {
                        try {
                            $path = "/images/property/" . $this->propcode . "/";
                            $full_path = public_path() . $path;
                            if (!file_exists($full_path)) {
                                \mkdir($full_path, 0755);
                            }
                            // set memory limit
                            ini_set('memory_limit', '256M');
                            $ext = $file->extension();
                            $image = 'PROPERTY' . time() . rand(1000, 9999) . '.' . $ext;
                            // move image to desired folder
                            $file->move($full_path, $image);
                            $image = $full_path . $image;
                            $thumbnail = 'THUMB' . time() . rand(1000, 9999) . '.' . $ext;
                            // move thumbnail to desired folder
                            $img = IntImage::make($image);
                            $img->resize(intval(370), intval(260));
                            $thumbnail = $full_path . $thumbnail;
                            $img->save($thumbnail);
                            $insert = array();
                            $insert['property_id'] = $this->property_id;
                            $insert['image_url'] = $path . basename($image);
                            $insert['image_thumb'] = $path . basename($thumbnail);
                            $insert['physical_loc'] = 1;
                            $insert['admin_id'] = $this->admin_id;
                            $insert['ext'] = $ext;
                            $insert['created_at'] = date('Y-m-d H:i:s');
                            Image::create($insert);
                        }
                        catch (\Exception $exception)
                        {
                            $error[] = $exception->getMessage();
;                        }

                   }
                }
            }
   }

}
