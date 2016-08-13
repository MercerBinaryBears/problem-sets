<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolutions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solutions', function($table) {
            $table->increments('id');
            $table->integer('language_id')->unsigned();
            $table->integer('problem_id')->unsigned();
            $table->longText('code');
            $table->timestamps();

            $table->foreign('language_id')->references('id')->on('languages');
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
        Schema::drop('solutions');
    }
}
