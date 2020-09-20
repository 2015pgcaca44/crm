<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['client_type','name','phone','email','company','industry','address','pin','city','state','rating','website','budget','description','linkdin_profile','joining_date','project_type','project_discription','status','gst_number','country','contact_person_phone','contact_person_email','disignation','package_name','pack_start_date','pack_end_date','remember_token','created_at','updated_at','notify_sts'];
}
