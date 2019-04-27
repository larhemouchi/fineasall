<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sieges', function (Blueprint $table) {
            $table->increments('id');


            $table->integer('cat_id')->unsigned()->index();
            $table->foreign('cat_id')
              ->references('id')
              ->on('cats')
              ->onDelete('cascade');


            $table->integer('num')->nullable();
            $table->string('map')->nullable();


              $table->integer('salle_id')->unsigned()->index();
            $table->foreign('salle_id')
              ->references('id')
              ->on('salles')
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
        Schema::dropIfExists('sieges');
    }
}
