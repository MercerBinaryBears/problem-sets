<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePracticeProblemSets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practice_problem_sets', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('practice_problem_set_problem', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('practice_problem_set_id')->unsigned();
            $table->integer('problem_id')->unsigned();

            $table->foreign('practice_problem_set_id')->references('id')->on('practice_problem_sets');
            $table->foreign('problem_id')->references('id')->on('problems');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('practice_problem_set_problem');
        Schema::drop('practice_problem_sets');
    }
}
