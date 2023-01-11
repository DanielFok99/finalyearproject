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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->string('doc_number');
            $table->foreignId('warehouse_id');
            $table->foreignId('supplier_id');
            $table->decimal('total_tax', 9, 3)->default(0);
            $table->decimal('due_amount', 9, 3)->default(0);
            $table->decimal('sub_total', 9, 3)->default(0);
            $table->decimal('total_amount', 9, 3)->default(0);
            $table->decimal('profit', 9, 3)->default(0);
            $table->string('status');
            $table->decimal('total_discount', 9, 3)->default(0);
            $table->text('purchase_note');
            $table->dateTime('prefer_ship_time');
            $table->foreignId('created_by');
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
        Schema::dropIfExists('purchase_orders');
    }
};
