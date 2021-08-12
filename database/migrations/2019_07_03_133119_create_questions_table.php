<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
             $table->id();
            $table->string('question_title')->nullable();
            $table->string('question_url')->nullable();

            $table->string('listening_title')->nullable();
            $table->string('listening_url')->nullable();

            $table->string('answer_title')->nullable();
            $table->string('answer_url')->nullable();
            $table->tinyInteger('is_active')->default('1');
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
        Schema::drop('questions');
    }
}
