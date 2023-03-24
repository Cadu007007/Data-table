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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('supplier');
            $table->unsignedBigInteger('invoice_num');
            $table->string('art');
            $table->unsignedInteger('quantity');
            $table->enum('currency', ['eur','usd'])->default('eur');
            $table->string('rech_art');
            $table->unsignedDecimal('customs')->default(0);
            $table->unsignedDecimal('vat')->default(0);
            $table->unsignedDecimal('shipment')->default(0);
            $table->string('assignment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
