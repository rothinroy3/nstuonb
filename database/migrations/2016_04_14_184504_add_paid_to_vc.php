<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaidToVc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
                
        Schema::table('vc', function($table)
        {
            $table->rememberToken();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
