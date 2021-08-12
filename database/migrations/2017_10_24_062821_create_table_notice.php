<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNotice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notices', function (Blueprint $table) {
             $table->id();

            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreignId('notice_category_id')->references('id')->on('notice_categories')->onDelete('cascade');
            $table->string('title',150);
            $table->string('alias',150);
            $table->longText('content');
            $table->tinyInteger('status')->default('1');
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
        Schema::dropIfExists('notices');
    }
}
