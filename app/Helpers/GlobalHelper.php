<?php
namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;
use Intervention\Image\Facades\Image as IntImage;
use App\Order;
class GlobalHelper
{
     public static  function keyPairCreator($object,$key_one,$key_two)
     {
        if(!GlobalHelper::multipleEmpty($object,$key_one,$key_two))
        {
            $array       = array();
            $object      = json_decode(json_encode($object), true);
            foreach ($object  as $element)
            {
                $index            = $element[$key_one];
                $array["$index"]  = $element[$key_two];
            }
            return $array;
        }
        return [];
     }
     public static function  get_sum()
    {
        $total = 0;
        $arr   = [];
        foreach(func_get_args() as $arg)
        {
            if(!empty($arg))
                {
                    $total+=$arg;
                    $arr[] = $arg;
                }
        }
        return $total;
    }
     public static function  multipleEmpty()
    {
        foreach(func_get_args() as $arg)
            if(empty($arg))
                continue;
            else
                return false;
        return true;
    }
    public static function arrayMergeAssoc($primary, $secondary)
    {
        $array = array();
        foreach($secondary as $key=>$value)
        {
            $array[$key] = $value;
        }
        foreach($primary as $key=>$value)
        {
            $array[$key] = $value;
        }
        return $array;
    }

    public static function multipleFileUpload($request=null, $disk,$name,$path)
    {
        $fileNames = array();
          if(request()->hasfile("$name"))
          {
               $files = request()->$name;
               foreach($files as $file)
               {
                  $fileNames[] = Storage::disk("$disk")->put("$path", $file);
               }
          }
          return $fileNames;
    }
    public static function multiStepFileUpload($request, $disk,$file_array,$path)
    {
         $uploads = array();
        foreach($file_array as $name)
        {
          if(request()->hasfile("$name"))
          {
            $file = request()->$name;
            if($file->isValid())
            {
                $fileName         = array();
                $fileName['key']  = $name;
                $fileName['ext']  = $file->extension();
                $fileName['file'] = Storage::disk("$disk")->put("$path", $file);
                array_push($uploads,$fileName);
            }
          }
        }
        return $uploads;
    }
     public static function multipleDocumentUpload($request=null, $disk,$name,$path)
    {
        $fileNames = array();
          if(request()->hasfile("$name"))
          {
               $files = request()->$name;
               foreach($files as $file)
               {
                  $fileName['file_url']  = Storage::disk("$disk")->put("$path", $file);
                  $fileName['extension'] = $file->getExtension();
                  array_push($fileNames,$fileName);
               }
          }
          return $fileNames;
    }
    public static function singleFileUpload($request=null,$disk, $name,$path)
    {
         $fileName = null;
          if(request()->has("$name"))
          {
               $file = request()->$name;
                  $fileName= Storage::disk("$disk")->put("$path", $file);
          }
          return $fileName;
    }
    public static function getObjectSingleValue($object,$keyName,$alterNative)
    {
        return Arr::get(json_decode(json_encode($object), true), "0.$keyName", $alterNative);
    }

}
