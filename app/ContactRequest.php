<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $input)
 */
class ContactRequest extends Model
{
   protected $table    = 'contact_request';
   protected $fillable = ['name','email','enquiry_for','mobile', 'subject','message','created_at','status'];
}
