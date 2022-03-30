<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('permanent_address');
            $table->string('local_address');
            $table->date('dob');
            $table->string('student_contact');
            $table->string('guardians_name');
            $table->string('guardian_contact');
            $table->date('joined_date');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('program_id');
            $table->enum ('gender', ['Male', 'Female', 'Other']);
            $table-> enum('status', ["Passed out", "Running"]);
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('program_id')->references('id')->on('programs');
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
        Schema::dropIfExists('students');
    }
}
