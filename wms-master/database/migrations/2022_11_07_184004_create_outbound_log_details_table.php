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
        Schema::create('outbound_log_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('outbound_log_id');
            $table->foreignId('product_sku_id');
            $table->foreignId('product_unit_id');
            $table->integer('count_quantity');
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
        Schema::dropIfExists('outbound_log_details');
    }
};
