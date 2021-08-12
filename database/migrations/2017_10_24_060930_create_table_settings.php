<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
             $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('logo',100);
            $table->string('title',65);
            $table->text('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();
            $table->longText('content')->nullable();
            $table->longText('contact')->nullable();
            $table->longText('admit_message')->nullable();
            $table->string('copyright',150);
            $table->string('powered',100);
            $table->string('diu_logo',100)->nullable();
            $table->string('diil_logo',100)->nullable();
            $table->string('signature',100)->nullable();
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
        Schema::drop('settings');
    }
}
