<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adminTeachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('th_name');
            $table->string('th_username');
            $table->string('th_password');
            $table->integer('dept_id');
            $table->string('th_email');
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
        Schema::drop('adminTeachers');
    }
}
