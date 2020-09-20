<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client_type',20);
            $table->string('gst_number',20);
            $table->string('country',30);
            $table->string('contact_person_phone',15);
            $table->string('contact_person_email',50);
            $table->string('disignation',30);
            $table->string('package_name',20);
            $table->string('pack_start_date',20);
            $table->string('pack_end_date',20);
            $table->string('name',35);
            $table->string('phone',12);
            $table->string('email',50)->unique();
            $table->string('company',30);
            $table->string('address',50);
            $table->string('pin',20);
            $table->string('city',20);
            $table->string('state',20);
            $table->string('website',30);
            $table->string('budget',20);
            $table->date('joining_date');
            $table->string('project_type',30);
            $table->integer('status');
            $table->integer('notify_sts');
            $table->rememberToken();
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
        Schema::dropIfExists('customers');
    }
}
