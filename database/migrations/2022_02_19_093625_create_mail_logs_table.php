<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_logs', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['JOB_ALERT', 'SYSTEM'])->default('JOB_ALERT');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('job_notification_id')->nullable();
            $table->string('subject');
            $table->enum('status', ['SENDING', 'DELIVERED', 'FAILED'])->default('SENDING');
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
        Schema::dropIfExists('mail_logs');
    }
}
