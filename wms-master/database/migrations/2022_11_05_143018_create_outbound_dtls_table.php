<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outbound_dtls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('outbound_id');
            $table->foreignId('product_sku_id');
            $table->string('doc_uom');
            $table->integer('doc_quantity');
            $table->integer('uom_rate');
            $table->string('base_uom');
            $table->integer('base_quantity');
            $table->integer('quantity');
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
        Schema::dropIfExists('outbound_dtls');
    }
};
