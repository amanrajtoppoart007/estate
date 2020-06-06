<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactRequest extends Model
{
   protected $table    = 'contact_request';
   protected $fillable = ['name','email','mobile', 'subject','message','created_at','status'];
}
