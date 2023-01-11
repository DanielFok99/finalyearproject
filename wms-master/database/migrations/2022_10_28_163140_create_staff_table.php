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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('contact');
            $table->string('email');
            $table->string('gender');
            $table->foreignId('roles_id');
            $table->foreignId('warehouse_id');
            $table->string('status');
            $table->string('avatar');
            $table->foreignId('created_by');
            $table->boolean('is_verified');
            $table->string('password');
            $table->boolean('is_admin');
            $table->rememberToken();
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
        Schema::dropIfExists('staff');
    }
};
