<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsOrganicAndPhoneNumberAndProjectStartDateAndPossessionTimeToCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaigns', function (Blueprint $table) {
            $table->string('is_organic')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('project_start_date')->nullable();
            $table->string('possession_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaigns', function (Blueprint $table) {
            Schema::dropIfExists('campaigns');
        });
    }
}
