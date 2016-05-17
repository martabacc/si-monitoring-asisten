<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('classes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subject_id')->unsigned();
            $table->char('class', 1);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('subject_id')
                ->references('id')
                ->on('subjects');
        });

        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('class_id')->unsigned();
            $table->string('name');
            $table->string('day');
            $table->string('place');
            $table->string('schedule');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('class_id')
                ->references('id')
                ->on('classes');
        });

        Schema::create('classes_students', function (Blueprint $table) {
            $table->integer('class_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->primary(['class_id', 'student_id']);
            $table->foreign('class_id')
                ->references('id')
                ->on('classes');
            $table->foreign('student_id')
                ->references('user_id')
                ->on('students');
        });

        Schema::create('classes_teachers', function (Blueprint $table) {
            $table->integer('class_id')->unsigned();
            $table->integer('teacher_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->primary(['class_id', 'teacher_id']);
            $table->foreign('class_id')
                ->references('id')
                ->on('classes');
            $table->foreign('teacher_id')
                ->references('user_id')
                ->on('teachers');
        });

        Schema::create('classes_assistants', function (Blueprint $table) {
            $table->integer('class_id')->unsigned();
            $table->integer('assistant_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->primary(['class_id', 'assistant_id']);
            $table->foreign('class_id')
                ->references('id')
                ->on('classes');
            $table->foreign('assistant_id')
                ->references('user_id')
                ->on('assistants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('classes_assistants');
        Schema::drop('classes_teachers');
        Schema::drop('classes_students');
        Schema::drop('schedules');
        Schema::drop('classes');
        Schema::drop('subjects');
    }
}
