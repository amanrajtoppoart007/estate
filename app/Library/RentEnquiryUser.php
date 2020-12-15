<?php

namespace App\Library;
class RentEnquiryUser
{

    public function get($query, $type): array
    {
        $user['email'] = $query->email;
        $user['name'] = $query->name;
        $user['country_code'] = $query->country_code;
        $user['tenant_count'] = $query->tenant_count;
        $user['bedroom'] = $query->bedroom;
        $user['mobile'] = $query->mobile;
        if ($type == "tenant")
        {
            $user['tenant_id']    = $query->id;
            $user['tenancy_type'] = $query->tenant_type;
            $user['rent_enquiry_id'] = $query->rent_enquiry->id??null;
        }
        if($type == "rent_enquiry")
        {
            $user['tenant_id'] = $query->tenant->id ?? null;
            $user['tenancy_type'] = $query->tenancy_type;
            $user['rent_enquiry_id'] = $query->rent_enquiry_id;
        }
        return $user;
    }
}
