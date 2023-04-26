<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendences', function (Blueprint $table) {
            $table->id();

            $table->boolean('status');

            $table->unsignedBigInteger('students_id');
            $table->foreign('students_id')->references('id')->on('students')->onDelete('cascade');

            $table->unsignedBigInteger('s_course_id');
            $table->foreign('s_course_id')->references('id')->on('courses')->onDelete('cascade');
            
            $table->unsignedBigInteger('s_semesters_id');
            $table->foreign('s_semesters_id')->references('id')->on('semesters')->onDelete('cascade');

            $table->unsignedBigInteger('s_divisions_id');
            $table->foreign('s_divisions_id')->references('id')->on('divisions')->onDelete('cascade');

            $table->unsignedBigInteger('s_subject_id');
            $table->foreign('s_subject_id')->references('id')->on('subjects')->onDelete('cascade');

            $table->timestamp('attendence_date');
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
        Schema::dropIfExists('attendences');
    }
};
