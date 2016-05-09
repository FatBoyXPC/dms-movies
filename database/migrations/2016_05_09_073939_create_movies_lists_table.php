<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies_lists', function (Blueprint $table) {
            $table->integer('movie_id')->unsigned();
            $table->foreign('movie_id')->references('id')->on('movies');
            $table->integer('movie_list_id')->unsigned();
            $table->foreign('movie_list_id')->references('id')->on('movie_lists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('movies_lists');
    }
}
