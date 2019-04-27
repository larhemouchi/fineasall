<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reps', function (Blueprint $table) {
            $table->increments('id');

            $table->float('prix');




            $table->integer('theatre_id')->unsigned()->index();
            $table->foreign('theatre_id')
              ->references('id')
              ->on('theatres')
              ->onDelete('cascade');


            $table->integer('salle_id')->unsigned()->index();
            $table->foreign('salle_id')
              ->references('id')
              ->on('salles')
              ->onDelete('cascade');

            $table->dateTime('dateheure');



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
        Schema::dropIfExists('reps');
    }
}
