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
        Schema::create('product_quantities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('quantity');
            $table->foreignId('product_unit_id');
            $table->foreignId('product_sku_id');
            $table->foreignId('supplier_id');
            $table->foreignId('warehouse_id');
            $table->decimal('purchase_price', 9, 3)->default(0);
            $table->decimal('selling_price', 9, 3)->default(0);
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
        Schema::dropIfExists('product_quantities');
    }
};
