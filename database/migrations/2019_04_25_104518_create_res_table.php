<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('res', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('rep_id')->unsigned()->index();
            $table->foreign('rep_id')
              ->references('id')
              ->on('reps')
              ->onDelete('cascade');


            $table->integer('siege_id')->unsigned()->index();
            $table->foreign('siege_id')
              ->references('id')
              ->on('sieges')
              ->onDelete('cascade');


            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade');





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
        Schema::dropIfExists('res');
    }
}
