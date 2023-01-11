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
        Schema::create('product_skus', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->nullable()->unique();
            $table->string('alternative_code')->nullable();
            $table->foreignId('product_id');
            $table->string('title');
            $table->decimal('ref_purchase_price', 9, 3)->default(0);
            $table->decimal('ref_selling_price', 9, 3)->default(0);
            $table->boolean('enabled')->default(true);
            $table->string('barcode')->nullable();
            $table->string('image_url')->nullable();
            $table->boolean('is_default');
            $table->foreignId('created_by')->nullable();
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
        Schema::dropIfExists('product_skus');
    }
};
