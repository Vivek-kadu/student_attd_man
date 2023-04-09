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
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('roll_no');

            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('course');
            
            
            $table->unsignedBigInteger('division_id');
            $table->foreign('division_id')->references('id')->on('division');
            
            $table->unsignedBigInteger('semester_id');
            $table->foreign('semester_id')->references('id')->on('semester');
            
            $table->unsignedBigInteger('year_id');
            $table->foreign('year_id')->references('id')->on('year');

            $table->string('gender');

            $table->string('phone_no');
            $table->timestamp('addmission_date');
            $table->timestamps('');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student');
    }
};
