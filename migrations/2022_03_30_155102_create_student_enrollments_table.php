<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_enrollments', function (Blueprint $table) {
            $table->id();
            $table->date('joined_date');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('sem_id');
            $table->unsignedBigInteger('section_id');
            $table->enum('status', ["Enrolled", "Not Enrolled"]);
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('sem_id')->references('id')->on('semesters');
            $table->foreign('section_id')->references('id')->on('sections');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_enrollments');
    }
}
