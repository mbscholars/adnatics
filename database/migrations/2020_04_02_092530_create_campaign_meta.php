<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignMeta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_meta', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('campaign_id');
            $table->string('display_cordinates');
            $table->integer('impression');
            $table->integer('time_begin');
            $table->integer('time_end');
            $table->string('emotion');
            $table->string('age');
            $table->string('sex');
            $table->string('device_id');
            $table->double('cost');
            $table->string('channel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaign_meta');
    }
}
