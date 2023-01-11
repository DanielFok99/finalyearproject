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
        Schema::create('outbound_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('outbound_id');
            $table->foreignId('location_id');
            $table->foreignId('device_id');
            $table->foreignId('staff_id');
            $table->string('status');
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
        Schema::dropIfExists('outbound_logs');
    }
};
