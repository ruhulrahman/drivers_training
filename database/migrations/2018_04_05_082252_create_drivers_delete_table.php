<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversDeleteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers_delete', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('driver_id');
            $table->string('driver_name');
            $table->string('driver_mobile');
            $table->string('driver_nid');
            $table->string('driver_dl_type');
            $table->integer('deleter_id'); //user id
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
        Schema::dropIfExists('drivers_delete');
    }
}
