<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    // protected $table = 'Campaigns';
    protected $fillable = ['id','client_id','contact_person_id','lead_type','cust_id','created_time','ad_id','ad_name','adset_id','adset_name','campaign_id','campaign_name','form_id','form_name','is_organic','location','contact_via','prospect_name','contact_date','contact_time','topic_on','discription','budget','status','start_date','end_date','spend_money','leads','cpl','company','phone','email','website','recieved_amount','notify_sts_user','is_organic','phone_number','project_start_date','possession_time','email'];
    protected $primarykey = 'id';
    public $timestamps = true;
}
