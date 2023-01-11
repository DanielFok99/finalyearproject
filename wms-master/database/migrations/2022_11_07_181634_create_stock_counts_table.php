<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_counts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_id');
            $table->string('job_title');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('status');
            $table->text('remark');
            $table->integer('export_count');
            $table->dateTime('job_start');
            $table->dateTime('last_modified');
            $table->foreignId('job_created_by');
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
        Schema::dropIfExists('stock_counts');
    }
};
