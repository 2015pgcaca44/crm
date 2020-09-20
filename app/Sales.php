<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    // protected $table = 'Sales';
    protected $fillable = ['id','client_id','name','email','phone','company','industry','address','gender','pin','city','state','rating','website','budget','description','linkdin_profile','joining_date','project_type','project_discription','status','notify_sts'];
    protected $primarykey = 'id';
    public $timestamps = true;
}
