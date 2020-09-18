<?php
if (!function_exists('get_tenancy_type_title'))
{
  function get_tenancy_type_title($key)
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
          "company"=>"Company",
          "bachelor"=>"Bachelor"
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
          "three_br"=>"3 BR"
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
//get the breakdown items in a formatted array
if(!function_exists('get_breakdown_items')) {

    function get_breakdown_items($items)
    {
        $i =0;
        $output = array();
        foreach($items as $item)
        {
            $output["security_deposit"][$i] = $item->security_deposit;
            $output["municipality_fees"][$i] = $item->municipality_fees;
            $output["brokerage"][$i] = $item->brokerage;
            $output["contract"][$i] = $item->contract;
            $output["remote_deposit"][$i] = $item->remote_deposit;
            $output["sewa_deposit"][$i] = $item->sewa_deposit;
            $output["monthly_installment"][$i] = $item->monthly_installment;
            $output["total_monthly_installment"][$i] = $item->total_monthly_installment;
            $i++;
        }
        return $output;
    }

}
if (!function_exists('get_breakdown_item_title'))
{
  function get_breakdown_item_title($key)
  {
    $item =   array(
          "municipality_fees"=>"Municipality Fees",
          "brokerage"=>"Management Fees & Vat",
          "contract"=>"Tenancy Contract",
          "remote_deposit"=>"Remote Deposit",
          "sewa_deposit"=>"Sewa Deposit",
      );

    if(!empty($item[$key]))
    {
        return $item[$key];
    }
    else
    {
        return $key;
    }

  }
}

if (!function_exists('get_rent_enquiry_sources'))
{
  function get_rent_enquiry_sources()
  {
    return   array(
          "website"=>"Website",
          "walk_in"=>"Walk In",
          "broker"=>"Broker",
      );

  }
}
if (!function_exists('rent_period_types'))
{
  function rent_period_types()
  {
    return   array(
          "monthly"=>"Monthly",
          "half_yearly"=>"Half Yearly",
          "yearly"=>"Yearly",
      );

  }
}

if (!function_exists('get_bedrooms'))
{
  function get_bedrooms()
  {
    return  ["1","2","3","4","5","6","7","7+"];

  }
}

if (!function_exists('get_bathrooms'))
{
  function get_bathrooms()
  {
    return  ["1","2","3","4","5","6","7","7+"];

  }
}

if (!function_exists('get_furnishing_types'))
{
  function get_furnishing_types()
  {
      return [
          "furnished" => "Furnished",
          "unfurnished" => "Unfurnished",
          "semifurnished" => "Semi furnished",
      ];

  }
}

if (!function_exists('get_property_types'))
{
  function get_property_types()
  {
      return [
          "flat"=>"Flat",
          "townhouse" => "TownHouse",
          "vila" => "Villa",
          "office" => "Office",
      ];

  }
}

if (!function_exists('get_country_list'))
{
  function get_country_list()
  {
      $output = null;
     $countries = DB::table('countries')->where('is_disabled','0')->get();
     foreach($countries as $country)
     {

         if((!empty($country->code))&&(strlen($country->code)>=2)) {
             $output[$country->id] = $country->name;
         }
     }
    return $output;
  }
}

if (!function_exists('get_country_codes'))
{
  function get_country_codes()
  {
      $output = null;
     $countries = DB::table('countries')->where('is_disabled','0')->orderBy('code','ASC')->get();
     $i=0;
     foreach($countries as $country)
     {
         if((!empty($country->code))&&(strlen($country->code)>=2))
         {

             $country_code = preg_replace("/[^A-Za-z0-9\-]/","",$country->code);
             $flag         = strtolower($country->iso2);
             $flag         = asset("img/flags/$flag.svg");
             $output[$i] = ['country_code'=>$country_code ,'flag'=>$flag];

         }
         $i++;

     }
    return $output;
  }
}

if (!function_exists('get_countries'))
{
  function get_countries()
  {
      $output = null;
     $countries = DB::table('countries')->where('is_disabled','0')->orderBy('code','ASC')->get();
     $i=0;
     foreach($countries as $country)
     {
         if((!empty($country->code))&&(strlen($country->code)>=2))
         {

             $country_code = preg_replace("/[^A-Za-z0-9\-]/","",$country->code);
             $flag         = strtolower($country->iso2);
             $flag         = asset("img/flags/$flag.svg");
             $output[$i] = ['country_code'=>$country_code ,'flag'=>$flag,'id'=>$country->id,'country_name'=>$country->name];

         }
         $i++;

     }
    return $output;
  }
}

