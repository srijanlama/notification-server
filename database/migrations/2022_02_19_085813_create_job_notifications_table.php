<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_notifications', function (Blueprint $table) {
            $table->id();
            $table->string('manpower_name');
            $table->string('country');
            $table->string('title_en');
            $table->string('title_np');
            $table->string('salary_min');
            $table->string('salary_max');
            $table->string('lt_number');
            $table->dateTime('expires_on');
            $table->dateTime('final_interview_date');
            $table->integer('no_of_vacancies');
            $table->enum('status', ['ACTIVE', 'INACTIVE'])->default('ACTIVE');
            $table->boolean('is_promoted')->default(1);
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
        Schema::dropIfExists('job_notifications');
    }
}
