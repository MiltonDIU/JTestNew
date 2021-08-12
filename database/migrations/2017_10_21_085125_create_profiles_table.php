<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('exam_level_id')->references('id')->on('exam_levels')->nullable();
            $table->foreignId('religion_id')->references('id')->on('religions')->onDelete('cascade');
            $table->string('father_name');
            $table->string('mother_name');
            $table->date('dob');
            $table->string('nationality');
            $table->string('identity');
            $table->string('identity_file');
            $table->text('address');
            $table->string('signature');
            $table->string('avatar');
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
        Schema::drop('profiles');
    }
}
