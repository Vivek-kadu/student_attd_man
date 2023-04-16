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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->string('roll_no');
            $table->string('email');

            $table->unsignedBigInteger('courses_id');
            $table->foreign('courses_id')->references('id')->on('courses');
            
            $table->unsignedBigInteger('semesters_id');
            $table->foreign('semesters_id')->references('id')->on('semesters');

            $table->unsignedBigInteger('divisions_id');
            $table->foreign('divisions_id')->references('id')->on('divisions');
            
            // $table->unsignedBigInteger('subject_id');
            // $table->foreign('subject_id')->references('id')->on('subjects');
            


            $table->string('gender');

            $table->string('phone_no');


            $table->timestamp('addmission_data');
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
};