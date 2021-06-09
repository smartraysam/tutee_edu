<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 200)->nullable();
            $table->string('last_name', 200)->nullable();
            $table->string('gender', 200)->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('grade', 200)->nullable();
            $table->string('email', 200)->nullable();
            $table->string('mobile', 200)->nullable();

            $table->string('academic_year', 200)->nullable();
            $table->string('class', 200)->nullable();
            $table->string('age', 200)->nullable();

            $table->string('guardian_name', 200)->nullable();
            $table->string('guardian_email', 200)->nullable();
            $table->string('guardian_relationship', 200)->nullable();

            $table->string('guardian_mobile', 200)->nullable();
            $table->string('question', 200)->nullable();

            $table->string('medium')->nullable();
            $table->json('subject')->nullable();
            $table->string('district')->nullable();
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
        Schema::dropIfExists('student_registrations');
    }
}