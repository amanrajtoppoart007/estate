<?php
if (!function_exists('get_tenancy_type'))
{
  function get_tenancy_type($key)
  {
      $types = array(
          "family_husband_wife"=>"Family (Husband & Wife)",
          "family_brother_sister"=>"Family (Brother & Sister)",
          "company"=>"Company","bachelor"=>"Bachelor"
      );
      return $types[$key] ? $types[$key] : null;
  }
}

if (!function_exists('get_rent_breakdown_parameters'))
{
  function get_rent_breakdown_parameters()
  {
      $params = array(
          "family_husband_wife"=>"Family (Husband & Wife)",
          "family_brother_sister"=>"Family (Brother & Sister)",
          "company"=>"Company","bachelor"=>"Bachelor"
      );

  }
}