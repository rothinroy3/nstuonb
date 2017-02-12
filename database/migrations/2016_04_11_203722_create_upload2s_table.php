<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpload2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload2s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->integer('dept_id');
            $table->string('photo');
            $table->string('email')->unique();
            $table->string('remember_token');
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
        Schema::drop('upload2s');
    }
}
