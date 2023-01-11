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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('contact_number');
            $table->text('address');
            $table->string('tin_number');
            $table->string('status');
//            $table->text('note');
//            $table->string('person_in_charge_name');
//            $table->string('person_in_charge_contact');
//            $table->string('avatar')->nullable();
            $table->text('note')->nullable();
//            $table->string('status');
//            $table->foreignId('company_id');
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
        Schema::dropIfExists('suppliers');
    }
};
