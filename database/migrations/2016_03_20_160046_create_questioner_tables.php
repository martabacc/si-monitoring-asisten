<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionerTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('options', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id')->unsigned();
            $table->string('answer');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('question_id')
                ->references('id')
                ->on('questions');
        });

        Schema::create('questionnaires', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assistant_id')->unsigned();
            $table->string('title');
            $table->string('description');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('assistant_id')
                ->references('user_id')
                ->on('assistants');
        });

        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('questionnaire_id')->unsigned();
            $table->integer('question_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->integer('option_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('questionnaire_id')
                ->references('id')
                ->on('questionnaires');
            $table->foreign('question_id')
                ->references('id')
                ->on('questions');
            $table->foreign('student_id')
                ->references('user_id')
                ->on('students');
            $table->foreign('option_id')
                ->references('id')
                ->on('options');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('answers');
        Schema::drop('questionnaires');
        Schema::drop('options');
        Schema::drop('questions');
    }
}
