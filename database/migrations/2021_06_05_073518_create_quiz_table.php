<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz', function (Blueprint $table) {
            $table->id();
            $table->string('quiz_mark')->nullable();
            $table->string('quiz_medium')->comment("Sinhala,Tamil,English")->nullable();
            $table->string('quiz_grade')->comment("Grade6,Grade7, Grade8, Grade9, Grade10, Grade11")->nullable();
            $table->string('quiz_question')->nullable();
            $table->string('quiz_subject')->nullable();
            $table->string('quiz_options')->nullable();
            $table->string('quiz_answer')->nullable();
            $table->string('quiz_type')->comment("multiple choice,select, paragraph, free answer")->nullable();
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
        Schema::dropIfExists('quiz');
    }
}