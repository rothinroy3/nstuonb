<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVcnoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vcnotices', function (Blueprint $table) {
            $table->increments('vc_notice_id');
            $table->string('vc_notice_name');
            $table->string('vc_notice_details');
            $table->string('vc_notice_content');
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
        Schema::drop('vcnotices');
    }
}
