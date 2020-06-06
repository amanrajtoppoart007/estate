<?php
namespace App\Library;
class ObjectView 
{
    public function return_object_key($object, $key)
    {
        return ($object) ? (($object->$key) ? $object->$key : null) : null;
    }
}
