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
            $table->integer("class_id")->unsigned();
            $table->integer("student_id")->unsigned();
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('classes_students');
        Schema::drop('schedules');
        Schema::drop('classes');
        Schema::drop('subjects');
    }
}
