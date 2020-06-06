<?php

use App\User;
use App\ChartOfAccount;
use Symfony\Component\HttpFoundation\Request;

if (!function_exists('if_has_child_accounts'))
{
  function if_has_child_accounts($id)
  {
    return  ChartOfAccount::where('parent_id','=',$id)->count();
  }
}