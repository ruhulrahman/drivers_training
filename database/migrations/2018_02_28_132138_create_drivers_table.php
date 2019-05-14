<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('gender');
            $table->string('fathers_name')->nullable();
            $table->string('mothers_name')->nullable();
            $table->string('mobile', 20)->unique();
            $table->string('dl_no', 25)->unique();
            $table->string('date_of_birth');
            $table->string('roll');
            $table->string('blood')->nullable();
            $table->string('dl_type');
            $table->string('dl_class');
            $table->string('dl_issue');
            $table->string('dl_issue_date');
            $table->string('current_addr')->nullable();
            //$table->string('permanent_addr')->nullable();
            $table->unsignedInteger('tana_id'); // permanant address
            $table->string('picture')->nullable();
            $table->string('expire_date');
            $table->string('exam_date');
            $table->time('exam_time');
            $table->string('exam_listed')->nullable();
            $table->integer('creator_id'); //user id
            $table->integer('updator_id'); //user id
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
        Schema::dropIfExists('drivers');
    }
}
