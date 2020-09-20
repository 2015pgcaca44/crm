<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->increments('id');
            // $table->integer('client_id')->unsigned();
            $table->integer('client_id');
            $table->string('lead_type',30);
            $table->string('cust_id',30);
            $table->string('created_time',30);
            $table->string('ad_id',30);
            $table->string('ad_name',30);
            $table->string('adset_id',30);
            $table->string('adset_name',30);
            $table->string('campaign_id',30);
            $table->string('campaign_name',30);
            $table->string('form_id',30);
            $table->string('form_name',30);
            $table->string('location',30);
            $table->integer('contact_person_id');
            $table->string('contact_via',30);
            $table->string('prospect_name',30);
            $table->string('contact_date',30);
            $table->string('contact_time',30);
            $table->string('topic_on',50);
            $table->string('discription',100);
            $table->string('budget',100);
            $table->string('start_date',30);
            $table->string('end_date',30);
            $table->string('notify_status',30);
            $table->string('recieved_amount',30);
            $table->integer('status');
            $table->string('notify_sts_user',30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaigns');
    }
}
