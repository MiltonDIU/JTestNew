<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStudentIdResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('results', function (Blueprint $table) {
            $table->string('student_id',20)->after('schedule_id');
            $table->string('name',20)->after('student_id');
            $table->integer('test_year')->after('name');
            $table->string('dob_year',5)->after('test_year');
            $table->string('dob_month',5)->after('dob_year');
            $table->string('dob_day',5)->after('dob_month');
            $table->string('test_level',10)->after('dob_day');
            $table->string('result',10)->after('test_level');
            $table->string('total_score',10)->after('result');
            $table->tinyInteger('is_disqualified')->default(1)->after('total_score');
            $table->text('comment')->after('is_disqualified');
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
