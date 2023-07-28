<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Schema::create('payables', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('marketer_id')->references('id')->on('marketers');
        //     $table->foreignId('user_id')->references('id')->on('users');
        //     $table->integer('total_commission');
        //     $table->integer('payed');
        //     $table->integer('balance');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payables');
    }
};
