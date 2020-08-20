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

if (!function_exists('get_tenancy_types'))
{
  function get_tenancy_types()
  {
      return $types = array(
          "family_husband_wife"=>"Family (Husband & Wife)",
          "family_brother_sister"=>"Family (Brother & Sister)",
          "company"=>"Company","bachelor"=>"Bachelor"
      );
  }
}

if (!function_exists('get_unit_types'))
{
  function get_unit_types()
  {
      return $types = array(
          "studio"=>"Studio",
          "one_br"=>"1 BR",
          "two_br"=>"2 BR",
          "three_br"=>"3BR"
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

if (!function_exists('get_breakdown_item_config'))
{
  function get_breakdown_item_config()
  {
    return   array(
          "municipality_fees"=>"Municipality Fees",
          "brokerage"=>"Management Fees & Vat",
          "contract"=>"Tenancy Contract",
          "remote_deposit"=>"Remote Deposit",
          "sewa_deposit"=>"Sewa Deposit",
      );

  }
}
