<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRoleIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('verified')->default(0)->after('remember_token');
            $table->string('email_token')->nullable()->after('verified');
            $table->tinyInteger('status')->default(0)->after('email_token');
            $table->string('mobile')->nullable()->after('email');
            $table->string('gender')->nullable()->after('mobile');
            $table->foreignId('role_id')->references('id')->on('roles')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
        });
    }
}
