<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->bigInteger('client_id');
            $table->integer('impression_set');
            $table->integer('impression_actual')->nullable();
            $table->string('location_cordinates')->nullable();
            $table->string('location_radius')->nullable();
            $table->string('location_name')->nullable();
            $table->double('cpc');
            $table->bigInteger('billing_id')->nullable();
            $table->string('channels')->default('keke');
            $table->string('target_gender')->nullable();
            $table->integer('duration'); //this is in minutes
            $table->string('target_emotions')->nullable();
            $table->string('target_age')->nullable();
            $table->string('scheduled_date')->nullable();
            $table->string('stop_date')->nullable();
            $table->string('time_schedule')->nullable();
            $table->boolean('apcon_approval')->default('0');
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
