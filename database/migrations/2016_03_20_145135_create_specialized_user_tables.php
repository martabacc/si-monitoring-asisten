<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecializedUserTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->primary('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });

        Schema::create('assistants', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->primary('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });

        Schema::create('students', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->primary('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('students');
        Schema::drop('assistants');
        Schema::drop('teachers');
    }
}
