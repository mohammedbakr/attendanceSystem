<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('student_id')->unsigned()->nullable();
            $table->double('grades',8,2)->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_user');
    }
}
