<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmissionCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submission_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_sub_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('comment_type',['Verification', 'Checked',]);
            $table->string('commented_on')->nullable();
            $table->foreign('event_sub_id')->references('id')->on('events_submissions');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('submission_comments');
    }
}
