<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problems', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('start_page');
            $table->integer('end_page');
            $table->integer('competition_problem_set_id')->unsigned();
            $table->timestamps();

            $table->foreign('competition_problem_set_id')->references('id')->on('competition_problem_sets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('problems');
    }
}
