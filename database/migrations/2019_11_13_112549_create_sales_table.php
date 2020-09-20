<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id');
            // $table->unsignedBigInteger('client_id')->unsigned()->index();
            // $table->foreign('client_id')->references('id')->on('Clients')->onDelete('cascade');
            $table->string('name',35);
            $table->string('phone',12);
            $table->string('email',50)->unique();
            $table->string('company',30);
            $table->string('industry',30);
            $table->string('address',50);
            $table->string('gender');
            $table->string('pin',20);
            $table->string('city',20);
            $table->string('state',20);
            $table->string('rating',20);
            $table->string('website',30);
            $table->string('budget',20);
            $table->string('description',100);
            $table->string('linkdin_profile',100);
            $table->date('joining_date');
            $table->string('project_type',30);
            $table->string('project_discription',50);
            $table->integer('status');
            $table->string('notify_sts',30);
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
        Schema::dropIfExists('sales');
    }
}
