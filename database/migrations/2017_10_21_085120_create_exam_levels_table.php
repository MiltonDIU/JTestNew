<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExamLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_levels', function (Blueprint $table) {
             $table->id();
            $table->string('title')->nullable();
            $table->string('alias')->nullable();
            $table->tinyInteger('status')->default('1');
            $table->string('exam_level_code',3);
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
        Schema::drop('exam_levels');
    }
}
