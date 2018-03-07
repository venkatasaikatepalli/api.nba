<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSfrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sfrs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('accademic_year');
            $table->integer('ug_programs');
            $table->integer('pg_programs');
            $table->integer('ug2_students');
            $table->integer('ug3_students');
            $table->integer('ug4_students');
            $table->integer('pg1_students');
            $table->integer('pg2_students');
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
        Schema::dropIfExists('sfrs');
    }
}
