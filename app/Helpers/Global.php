<?php


use App\SystemSetting;

function get_first_letters($txt)
{
    $words = preg_split("/\s+/", "$txt");
    $acronym = "";

    foreach ($words as $w) {
        $acronym .= strtoupper($w[0]);
    }
    return $acronym;
}
if (!function_exists('extract_doc_keys'))
{
  function extract_doc_keys($object,...$keys)
  {
      $output = array();
      $i =0;
     foreach($object as $item)
     {
         foreach($keys as $key)
         {
             $output[$i][$key] = $item->$key ? $item->$key : null;
         }
         $i++;
     }
     return $output;
  }
}

if (!function_exists('get_systemSetting'))
{
  function get_systemSetting($name)
  {
    return  SystemSetting::where('name','=',$name)->pluck('value')->first();
  }
}

if (!function_exists('get_count')) {
  function get_count($table='')
  {
    $result= DB::table($table)->get()->count();
    return $result;
  }
}
if (!function_exists('get_item_count')) {
  function get_item_count($table='',$params)
  {
    if(!empty($params))
    {
      $result = DB::table($table)->where($params)->get()->count();
    }
    else
    {
      $result = DB::table($table)->get()->count();
    }

    return $result;
  }
}
function get_count_where($table='',$key='',$value='')
{
  $result= DB::table($table)->where($key,'=',$value)->get()->count();
  return $result;
}
function get_count_2where($table='',$key1='',$value1='',$key2='',$value2='')
{
  $result= DB::table($table)->where($key1,'=',$value1)->where($key2,'=',$value2)->get()->count();
  return $result;
}
if (!function_exists('pluck_single_value'))
{
  function pluck_single_value($table='',$key1='',$value1='',$column='')
  {
    $result= DB::table($table)->where($key1,'=',$value1)->pluck($column);
    return $result['0'];
  }
}
  if(!function_exists('object_to_array'))
  {
    function object_to_array($object)
    {
      return json_decode(json_encode($object), true);
    }
}
  if(!function_exists('key_extractor'))
  {
    function key_extractor($object ,$key_one, $key_two)
    {
      $array       = array();
      $object      = object_to_array($object);
      foreach ($object  as $element)
      {
        $id            = $element[$key_one];
        $array["$id"]  = $element[$key_two];
      }
      return $array;
    }
}

if(!function_exists('kebab_case'))
{
  function kebab_case($str)
  {
    return Str::kebab($str);
  }
}


if (!function_exists('time_ago')) {

    function time_ago($timestamp)
    {

        $seconds_ago = (time() - strtotime($timestamp));

if ($seconds_ago >= 31536000) {
    $msg = " " . intval($seconds_ago / 31536000) . " years ago";
} elseif ($seconds_ago >= 2419200) {
    $msg = " " . intval($seconds_ago / 2419200) . " months ago";
} elseif ($seconds_ago >= 86400) {
    $msg = " " . intval($seconds_ago / 86400) . " days ago";
} elseif ($seconds_ago >= 3600) {
    $msg = " " . intval($seconds_ago / 3600) . " hours ago";
} elseif ($seconds_ago >= 60) {
    $msg = " " . intval($seconds_ago / 60) . " minutes ago";
} else {
    $msg = "Less than a minute ago";
}

       return $msg;
    }
}

function RandomStringGenerator($n)
{
$s= "";
$r = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
$len = strlen($r);
for ($i = 0; $i < $n; $i++)
{
$aa = rand(0, $len - 1);
$s = $s . $r[$aa];
}
return $s;
}

 function getPropertyUnitStatus($code)
 {
     switch ($code) {

         case '2':
             $text = 'RENTED';
             $color = 'warning';
             break;
         case '3':
             $text = 'NEEDS-REHAB';
             $color = 'danger';
             break;
         case '4':
             $text = 'UNDER-REHAB';
             $color = 'danger';
             break;
         case '5':
             $text = 'EVICTION';
             $color = 'danger';
             break;
         case '6':
             $text = 'NEEDS-CLEANING';
             $color = 'info';
             break;
         case '7':
             $text = 'BOOKED';
             $color = 'disabled';
             break;
         case '8':
             $text = 'SOLD';
             $color = 'disabled';
             break;
         case '1':
         default:
             $text = 'VACANT';
             $color = 'primary';
             break;

     }
     return compact('text', 'color');
 }
  function trim_price($input)
 {
    $output = preg_replace('/[^A-Za-z0-9\-]/', '', $input);
    $output = str_replace("AED", "", $output);
    return trim($output);
 }
  function trim_unit_size($input)
 {
    $output = preg_replace('/[^A-Za-z0-9\-]/', '', $input);
    $output = str_replace("sqft", "", $output);
    return trim($output);
 }



