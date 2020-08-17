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
     return $params = array(
          "family_husband_wife"=>"Family (Husband & Wife)",
          "family_brother_sister"=>"Family (Brother & Sister)",
          "company"=>"Company","bachelor"=>"Bachelor"
      );

  }
}

if (!function_exists('get_rent_period_types'))
{
  function get_rent_period_types()
  {
    return   array(
          "monthly"=>"Monthly",
          "half_yearly"=>"Half Yearly",
          "yearly"=>"Yearly",
      );

  }
}
if (!function_exists('get_property_purpose_modes'))
{
  function get_property_purpose_modes()
  {
    return   array(
          "1"=>"Rent",
          "2"=>"Sale",
          "3"=>"Rent & Sale",
      );

  }
}
