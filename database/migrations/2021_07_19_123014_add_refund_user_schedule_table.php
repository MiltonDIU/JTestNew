<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRefundUserScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_schedule', function (Blueprint $table) {
            $table->enum('if_refund',[0,1])->after('status');
            $table->enum('if_next_exam',[0,1])->after('if_refund');
            $table->string('previous_schedule')->after('if_next_exam')->nullable();
            $table->string('next_schedule')->after('previous_schedule')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
