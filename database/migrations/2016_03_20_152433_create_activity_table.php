<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assistant_id')->unsigned();
            $table->integer('class_id')->unsigned();
            $table->string('name');
            $table->date('date');
            $table->integer('duration')->unsigned();
            $table->text('notes');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('assistant_id')
                ->references('user_id')
                ->on('assistants');

            $table->foreign('class_id')
                ->references('id')
                ->on('classes');
        });

        Schema::create('issues', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assistant_id')->unsigned();
            $table->integer('activity_id')->unsigned();
            $table->text('description');
            $table->integer('urgency')->unsigned();
            $table->text('solution')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('assistant_id')
                ->references('user_id')
                ->on('assistants');
            $table->foreign('activity_id')
                ->references('id')
                ->on('activities');
        });

        Schema::create('presences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned();
            $table->integer('activity_id')->unsigned();
            $table->string('notes');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('student_id')
                ->references('user_id')
                ->on('students');
            $table->foreign('activity_id')
                ->references('id')
                ->on('activities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('presences');
        Schema::drop('issues');
        Schema::drop('activities');
    }
}
