<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSchedules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
             $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->nullable();
            $table->foreignId('exam_level_id')->references('id')->on('exam_levels')->nullable();
            $table->string('title',100);
            $table->string('title_code',4);
            $table->string('alias',100);
            $table->string('exam_code',15);
            $table->dateTime('exam_date');
            $table->string('exam_duration',15);
            $table->string('exam_venue',100);
            $table->string('exam_venue_code',4);
            $table->tinyInteger('status')->default('0');
            $table->enum('admit',['1', '0'])->default('0');
            $table->softDeletes();
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
        Schema::drop('schedules');
    }
}
