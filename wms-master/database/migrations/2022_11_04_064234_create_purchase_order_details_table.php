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
        Schema::create('purchase_order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_sku_id');
            $table->foreignId('purchase_order_id');
            $table->foreignId('purchase_unit_id');
            $table->integer('quantity');
            $table->decimal('price', 9, 3)->default(0);
            $table->decimal('discount', 9, 3)->default(0);
            $table->decimal('sub_total', 9, 3)->default(0);
            $table->text('notes');
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
        Schema::dropIfExists('purchase_order_details');
    }
};
